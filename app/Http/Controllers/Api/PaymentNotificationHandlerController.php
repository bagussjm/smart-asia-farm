<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TicketRepository;
use Midtrans;
use Illuminate\Support\Facades\Log;

class PaymentNotificationHandlerController extends Controller
{
    private $TicketRepository;

    private $MidtransRepository;

    public function __construct(TicketRepository $TicketRepository)
    {
        $this->TicketRepository = $TicketRepository;
    }

    public function handle()
    {
        try{
            Midtrans\Config::$serverKey = env('MTS_SERVER_KEY');
            Midtrans\Config::$isProduction = false;
            $notification = new Midtrans\Notification();
            $notif = $notification->getResponse();
            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $order_id = $notif->order_id;
            $fraud = $notif->fraud_status;
            Log::info('handling notification order : '.$order_id.
            'status '.$transaction.' type: '.$type.' fraud : '.$fraud);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
}
