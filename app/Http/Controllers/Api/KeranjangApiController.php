<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Models\Keranjang;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Resources\KeranjangResource;
use Illuminate\Support\Facades\DB;

class KeranjangApiController extends ApiController
{
    private $insert = false;

    private $request = null;

    public function __construct()
    {
        $this->request = Request::class;
    }

    public function index()
    {
        return $this->successResponse(
              KeranjangResource::collection(
                  Keranjang::with('user','playground','ticket')
                      ->get()),
            'showing keranjang'
        );
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                    'id_user' => 'required',
                    'id_wahana' => 'required'
            ]);

            DB::beginTransaction();
            $insert = Keranjang::create([
                'id_user' => $request->id_user,
                'id_wahana' => $request->id_wahana,
            ]);

            if (!$insert) {
                DB::rollBack();
            } else {
                DB::commit();
                return $this->successResponse(
                    $insert
                    ,
                    'keranjang successfully created');
            }

        }catch (\Exception $e){
            return $this->errorResponse(
                [],
                $e->getMessage());
        }

        return $this->errorResponse(
            [],
            'unknown error'
        );
    }

}
