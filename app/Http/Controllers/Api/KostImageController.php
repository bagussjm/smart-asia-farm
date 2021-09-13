<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KostImageController extends Controller
{
    public function post(Request $request)
    {
        $path = '';
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('/public/landmark');
        }
        if ($path !== ''){
            return json_encode(array(
                'code' => 200,
                'status' => 'Post image successful',
                'data' => Storage::url($path)
            ));
        }

        return json_encode(array(
            'code' => 500,
            'status' => 'Internal server error',
            'data' => null
        ));
    }

    public function remove(Request $request)
    {
        if( Storage::delete($request->input('url'))){
            return json_encode(array(
                'code' => 200,
                'status' => 'Remove image successful',
                'data' => $request->input('url')
            ));
        }

        return json_encode(array(
            'code' => 500,
            'status' => 'Internal server error',
            'data' => $request->input('url')
        ));
    }

    public function pull(Request $request,Wahana $wahana)
    {

        $column = $request->input('column');
        $kostData = $wahana->toArray();
        $pullIndex = array_search($request->input('url'),$kostData[$column]);
        if (in_array($request->input('url'),$kostData[$column])){
            $img = $kostData[$column];

            if (count($img) > 1){
                Storage::delete($request->input('url'));
                array_splice($img,$pullIndex,1);
            }else if (count($img) === 1 ){
                Storage::delete($request->input('url'));
                $img = [];
            }

            $wahana->update([
                $column => $img
            ]);
            return json_encode(array(
                'code' => 200,
                'status' => 'Pull image data successful',
                'data' => $img,
                'index' => $pullIndex
            ));
        }

        return json_encode(array(
            'code' => 500,
            'status' => 'Internal server error',
            'data' => $kostData[$column]
        ));

    }
}
