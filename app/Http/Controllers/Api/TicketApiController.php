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

    public function show($ticket)
    {
        try{
            $ticket = $this->TicketRepository->find($ticket)->get();
            return $this->successResponse(
                new TiketResource($ticket),
                'success, show ticket '.$ticket->id
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

}
