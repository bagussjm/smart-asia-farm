<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ProfileResource;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilApiController extends ApiController
{
    public function show($profil)
    {
        try{
            $profil = Profil::findOrFail($profil);
            return $this->successResponse(
              new ProfileResource($profil),
              'showing profil'
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }

}
