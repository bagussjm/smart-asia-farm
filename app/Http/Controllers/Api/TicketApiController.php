<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\MidtransRepository;
use App\Repositories\TicketRepository;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketApiController extends ApiController
{
    private $TicketRepository;

    public function __construct()
    {
        $this->TicketRepository = new TicketRepository();
    }



}
