<?php

namespace App\Http\Controllers;



use App\Models\Wahana;
use App\Repositories\MidtransRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index()
    {
//        $order = $midtransRepository->orderStatus(1638543062190)->getOrder();
//
//        return response()->json($order->payment_type);
        return view('backend.dashboard');
    }

    public function qrImageTest()
    {
        try{
            $fileName = 'mawar-hitam-x-marwah-riau.png';
            $svg = QrCode::format('png')->generate($fileName);
            Storage::put('public/qr/png/'.$fileName,$svg);
            return  Storage::url('/qr/png/'.$fileName);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return $exception->getMessage();
        }
    }
}
