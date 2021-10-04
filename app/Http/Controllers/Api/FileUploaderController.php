<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploaderController extends ApiController
{
    public function post(Request $request)
    {
        try{
            $path = '';
            if ($request->hasFile('image')){
                $path = $request->file('image')->store('/public/profil');
            }
            if ($path !== ''){
                return $this->successResponse(
                    Storage::url($path)
                );
            }

            return $this->errorResponse(
                'internal server error'
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }

    public function remove(Request $request)
    {
        try{
            if (Storage::delete($request->input('url'))){
                return $this->successResponse(
                    $request->input('url'),
                    'successful remove image '.$request->input('url')
                );
            }
            return $this->errorResponse(
                null,
                'failed to remove image '.$request->input('url')
            );
        }catch (\Exception $exception){
            $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }
}
