<?php

namespace App\Http\Controllers;



use App\Models\Landmark;
use App\Models\Tiket;
use App\Models\Wahana;
use App\Repositories\MidtransRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index()
    {

        $lastMonthStartDate = Carbon::now()->subMonth()->startOfMonth()->translatedFormat('Y-m-d');
        $lastMonthEndDate = Carbon::now()->subMonth()->endOfMonth()->translatedFormat('Y-m-d');
        $thisMonthStartDate = Carbon::now()->startOfMonth()->translatedFormat('Y-m-d');
        $thisMonthEndDate = Carbon::now()->endOfMonth()->translatedFormat('Y-m-d');
//        dd($thisMonthStartDate);

        $ticketSoldData =  Tiket::settlement();
        $data['totalTicketsSold'] = $ticketSoldData->count();
        $data['totalVisitors'] = $ticketSoldData->sum('total_bayar');
        $data['totalLandmark'] = Landmark::count();
        $data['totalPlayground'] = Wahana::count();
        $data['ticketSalesLastMonth'] = $ticketSoldData->whereBetween('tanggal_masuk',[$lastMonthStartDate,$lastMonthEndDate])->sum('total_bayar');
        $data['ticketSalesThisMonth'] = Tiket::where('status','success')->whereBetween('tanggal_masuk',[$thisMonthStartDate,$thisMonthEndDate])->sum('total_bayar');

//        return response()->json($test);
        return view('backend.dashboard',$data);
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
