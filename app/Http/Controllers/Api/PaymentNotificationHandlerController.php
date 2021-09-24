<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Midtrans;
use Illuminate\Support\Facades\Log;

class PaymentNotificationHandlerController extends Controller
{
    private $TicketRepository;


    public function __construct(TicketRepository $TicketRepository)
    {
        $this->TicketRepository = $TicketRepository;
    }

    public function handle(Request $request)
    {
        try{
            $notification_body = json_decode($request->getContent(), true);
            $invoice = $notification_body['order_id'];
            $transaction_id = $notification_body['transaction_id'];
            $status_code = $notification_body['status_code'];
            Log::info('handling notification order : '.$invoice.
            'status '.$status_code.' transaction_id: '.$transaction_id);
            echo "OK";
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
}
