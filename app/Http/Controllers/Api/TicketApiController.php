<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\TiketResource;
use App\Repositories\MidtransRepository;
use App\Repositories\TicketRepository;
use App\Models\Tiket;
use Illuminate\Http\Request;
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

}
