<?php

namespace App\Http\Controllers;



use App\Models\Wahana;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index()
    {
        try{
            $img = QrCode::format('png')->generate('kambing');
            dd(
                $img
            );
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            dd(
                $exception->getMessage()
            );
        }

//        return view('backend.dashboard');
    }
}
