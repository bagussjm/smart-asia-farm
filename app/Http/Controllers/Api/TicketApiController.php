<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\TiketResource;
use App\Repositories\MidtransRepository;
use App\Repositories\TicketRepository;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketApiController extends ApiController
{
    private $TicketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->TicketRepository = $ticketRepository;
    }

    public function show($tiket)
    {
        try{
//            $ticket = $this->TicketRepository->find($ticket)->get();
            $cartsInTicket = Tiket::with(['carts' => function($q){
                $q->with('playground');
            },'entranceTicket'])->findOrFail($tiket);
            $ticket = collect([
                'id' => $cartsInTicket->id,
                'tanggal_masuk' => $cartsInTicket->tanggal_masuk,
                'jam_masuk' => $cartsInTicket->jam_masuk,
                'status' => $cartsInTicket->status,
                'total_bayar' => $cartsInTicket->total_bayar,
                'kode_qr' => $cartsInTicket->kode_qr,
                'instruksi_pembayaran' => $cartsInTicket->instruksi_pembayaran,
                'created_at' => $cartsInTicket->created_at,
                'updated_at' => $cartsInTicket->updated_at,
                'deleted_at' => $cartsInTicket->deleted_at
            ]);

            if ($cartsInTicket->entranceTicket->id !== null && $cartsInTicket->carts->count() > 0){
                $ticket->put('tipe_tiket','A');
            }elseif ($cartsInTicket->entranceTicket->id !== null && $cartsInTicket->carts->count() === 0){
                $ticket->put('tipe_tiket','B');
            }elseif ($cartsInTicket->entranceTicket->id === null && $cartsInTicket->carts->count() > 0){
                $ticket->put('tipe_tiket','C');
            }

            $ridesInTicket = collect([]);
            $cartsInTicket->carts->map(function ($value,$key) use ($ridesInTicket){
                $ridesInTicket->push($value->playground);
            });

            $ticket->put('wahana',$ridesInTicket->all());

            if ($cartsInTicket->entranceTicket->id !==null){
                $ticket->put('tiket_masuk',$cartsInTicket->entranceTicket);
            }else{
                $ticket->put('tiket_masuk',null);
            }
            return $this->successResponse(
                $ticket->all(),
                'success, show ticket '.$tiket
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

    public function ticketSalesChart()
    {
        try{
            return $this->successResponse(
                $this->mapToChartData(),
                'showing ticket sales chart data'
            );
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

    private function mapToChartData()
    {
        $januaryReports = $this->getMonthlyReports('2021-01');
        $februaryReports = $this->getMonthlyReports('2021-02');
        $marchReports = $this->getMonthlyReports('2021-03');
        $aprilReports = $this->getMonthlyReports('2021-04');
        $mayReports = $this->getMonthlyReports('2021-05');
        $juneReports = $this->getMonthlyReports('2021-06');
        $julyReports = $this->getMonthlyReports('2021-07');
        $augustReports = $this->getMonthlyReports('2021-08');
        $septemberReports = $this->getMonthlyReports('2021-09');
        $octoberReports = $this->getMonthlyReports('2021-10');
        $novemberReports = $this->getMonthlyReports('2021-11');
        $decemberReports = $this->getMonthlyReports('2021-12');

        return [
            $januaryReports['grand_total'],
            $februaryReports['grand_total'],
            $marchReports['grand_total'],
            $aprilReports['grand_total'],
            $mayReports['grand_total'],
            $juneReports['grand_total'],
            $julyReports['grand_total'],
            $augustReports['grand_total'],
            $septemberReports['grand_total'],
            $octoberReports['grand_total'],
            $novemberReports['grand_total'],
            $decemberReports['grand_total'],
        ];
    }

    public function getFromToBetweenMonth($month)
    {
        return [
            Carbon::make($month)->startOfMonth()->translatedFormat('Y-m-d'),
            Carbon::make($month)->endOfMonth()->translatedFormat('Y-m-d')
        ];
    }

    /**
     * @return array
     * */
    public function getMonthlyReports($month)
    {
        $filteredReports = $this->getFilteredReports();

        $reportPerMonth = $filteredReports
            ->whereBetween('date',$this->getFromToBetweenMonth($month));

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
