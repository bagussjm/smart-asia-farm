<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KostVideoController extends Controller
{

    public function post(Request $request)
    {
        $path = '';
        if ($request->hasFile('video')){
            $path = $request->file('video')->store('uploads/kost/video');
        }
        if ($path !== ''){
            return json_encode(array(
                'code' => 200,
                'status' => 'Post video successful',
                'data' => $path
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
                'status' => 'Remove video successful',
                'data' => $request->input('url')
            ));
        }

        return json_encode(array(
            'code' => 500,
            'status' => 'Internal server error',
            'data' => $request->input('url')
        ));
    }

    public function pull(Request $request,Kost $kost)
    {

        $column = $request->input('column');
        $kostData = $kost->toArray();
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

            $kost->update([
                $column => $img
            ]);
            return json_encode(array(
                'code' => 200,
                'status' => 'Pull video data successful',
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
