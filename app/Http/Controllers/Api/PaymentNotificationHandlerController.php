<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MidtransRepository;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentNotificationHandlerController extends Controller
{
    private $TicketRepository;

    private $MidtransRepository;

    public function __construct(TicketRepository $TicketRepository,MidtransRepository $midtransRepository)
    {
        $this->TicketRepository = $TicketRepository;
        $this->MidtransRepository = $midtransRepository;
    }

    public function handle()
    {
        try{
            $notif = $this->MidtransRepository->setNotification()->notificationResponse();
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
