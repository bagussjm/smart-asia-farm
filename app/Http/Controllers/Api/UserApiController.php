<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\KeranjangResource;
use App\Models\User;
use Illuminate\Http\Request;

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
}
