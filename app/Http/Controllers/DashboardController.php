<?php

namespace App\Http\Controllers;



use App\Models\Wahana;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index()
    {
        try{
            $fileName = 'kambing.svg';
            $svg = QrCode::generate($fileName);
            Storage::put('public/qr/png/'.$fileName,$svg);
            return  Storage::url('/qr/png/'.$fileName);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            dd(
                $exception->getMessage()
            );
        }

//        return view('backend.dashboard');
    }
}
