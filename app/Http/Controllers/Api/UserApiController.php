<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\KeranjangResource;
use App\Http\Resources\TiketResource;
use App\Models\Keranjang;
use App\Models\Tiket;
use App\Models\User;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserApiController extends ApiController
{
    public function index()
    {
        $user = User::all();

        return $this->successResponse(
            $user,
            'Showing user data'
        );
    }

    public function profile($user)
    {
        try{
            $profile = User::findOrFail($user);
            return $this->successResponse(
                $profile,
                'showing user '
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

    public function update($user,UserUpdateRequest $userUpdateRequest)
    {
        DB::beginTransaction();
        try{
            $profile = User::findOrFail($user);

            $profile->update(
                $userUpdateRequest->validated()
            );

            DB::commit();
            return $this->successResponse(
                $profile,
                'success update user personal data'
            );
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

    public function charts($user)
    {
        try{
            $userCarts = User::findOrFail($user)->cartsUnprocessed()->get();

            return $this->successResponse(
                KeranjangResource::collection($userCarts),
                'showing user charts'
            );

        }catch (\Exception $e){
            return $this->errorResponse(
                [],
                $e->getMessage()
            );
        }
    }

    public function tickets($user, Request $request,TicketRepository $ticketRepository)
    {
        try{
            $request->validate([
               'status' => [
                   Rule::in(['pending','success','failed'])
               ]
            ]);
            $ticket = $ticketRepository->userTicket($user,$request->query('status'));
            return $this->successResponse(
                TiketResource::collection($ticket),
                'showing user tickets'
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }
}
