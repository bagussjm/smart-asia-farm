<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Wahana;
use Illuminate\Http\Request;
use App\Http\Resources\WahanaResource;

class WahanaApiController extends ApiController
{
    public function index()
    {
        return $this->successResponse(
            WahanaResource::collection(Wahana::all()),
            'showing wahana'
        );
    }

    public function show($wahana)
    {
        try{
            $wahana = Wahana::findOrFail($wahana);

            return $this->successResponse(
                new WahanaResource($wahana),
                'success'
            );
        }catch (\Exception $e){
            return $this->errorResponse(
                [],
                $e->getMessage()
            );
        }
    }
}
