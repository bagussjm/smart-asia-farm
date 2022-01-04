<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Void_;

class ReportController extends Controller
{
    private $reportYear;

    public function __construct()
    {
        $this->reportYear = Carbon::now()->translatedFormat('Y');
    }

    public function visitorReport()
    {

        $data['januaryReports'] = $this->getMonthlyReports('01');
        $data['februaryReports'] = $this->getMonthlyReports('02');
        $data['marchReports'] = $this->getMonthlyReports('03');
        $data['aprilReports'] = $this->getMonthlyReports('04');
        $data['mayReports'] = $this->getMonthlyReports('05');
        $data['juneReports'] = $this->getMonthlyReports('06');
        $data['julyReports'] = $this->getMonthlyReports('07');
        $data['augustReports'] = $this->getMonthlyReports('08');
        $data['septemberReports'] = $this->getMonthlyReports('09');
        $data['octoberReports'] = $this->getMonthlyReports('10');
        $data['novemberReports'] = $this->getMonthlyReports('11');
        $data['decemberReports'] = $this->getMonthlyReports('12');

//        return response()->json($data);

        return view('backend.report.visitor',$data);
    }

    public function getFromToBetweenMonth($month)
    {
        return [
            Carbon::make($month)->startOfMonth()->translatedFormat('Y-m-d'),
            Carbon::make($month)->endOfMonth()->translatedFormat('Y-m-d')
        ];
    }

    /**
     * @param String $month
     * @return array
     * */
    public function getMonthlyReports($month)
    {
        $filteredReports = $this->getFilteredReports();

        $reportPerMonth = $filteredReports
            ->whereBetween('date',$this->getFromToBetweenMonth($this->reportYear.'-'.$month));

        return array(
            'man' => $reportPerMonth->where('sex','laki-laki')->count(),
            'woman' => $reportPerMonth->where('sex','perempuan')->count(),
            'grand_total' => $reportPerMonth->sum('gross_amount'),
            'formatted_grand_total' => 'Rp '.number_format($reportPerMonth->sum('gross_amount'),0,'','.')
        );
    }

    /**
     * @return Collection
     * */
    public function getFilteredReports()
    {
        $filteredReports = collect([]);
        $reportData = Tiket::with(['carts' => function($q){
            $q->with('user');
        },'entranceTicket' => function($q){
            $q->with('user');
        }])
            ->settlement()
            ->scanned()
            ->get();
        $reportData->map(function ($value,$key) use ($filteredReports){
            $user = null;
            $sex = null;
            if ($value->carts->first() !== null){
                $user = $value->carts->first()->user->nama_lengkap;
                $sex = $value->carts->first()->user->jenis_kelamin;
            }else{
                $user = $value->entranceTicket->user->nama_lengkap;
                $sex = $value->entranceTicket->user->jenis_kelamin;
            }
            $filteredReports->push([
                'ticket_id' => $value->id,
                'date' => $value->tanggal_masuk,
                'gross_amount' => $value->total_bayar,
                'user' => $user,
                'sex' => $sex
            ]);
        });

        return $filteredReports;
    }
}
