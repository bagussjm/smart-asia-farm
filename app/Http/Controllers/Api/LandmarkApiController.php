<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\LandmarkResource;
use App\Models\Landmark;
use Illuminate\Http\Request;

class LandmarkApiController extends ApiController
{
    public function index()
    {
        return $this->successResponse(
            LandmarkResource::collection(Landmark::all()),
            'showing landmark');
    }

    public function show($landmark)
    {
        try{
            $landmark = Landmark::findOrFail($landmark);

            return $this->successResponse(
                $landmark,
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
