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

    public function handler()
    {
        Log::info('midtrans webhook called');

    }

    public function handleOrder(MidtransRepository $midtransRepository)
    {
        try{

            $notification = $midtransRepository->setNotification()->notificationResponse();
            Log::info('midtrans webhook called '.$notification->order_id.' status : ');
//            $successTransaction = $this->notificationResponseHandler($notification);
//
//            if ($successTransaction){
//                return $this->successResponse(
//                    [],
//                    'Ok'
//                );
//            }else{
//                return $this->errorResponse(
//                    [],
//                    'Failed'
//                );
//            }

        }catch (\Exception $exception){
            $this->errorResponse(
                [],
                'failed, '.$exception->getMessage()
            );
        }
    }


    public function notificationResponseHandler($notification)
    {
        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $order_id = $notification->order_id;
        $fraud = $notification->fraud_status;

        if ($transaction === 'capture') {
            if ($type === 'credit_card') {
                if ($fraud === 'challenge') {
                    return $this->successOrFailed($order_id,false);
                } else {
                    return $this->successOrFailed($order_id,true);
                }
            }
        } else if ($transaction === 'settlement') {
            return $this->successOrFailed($order_id,true);
        } else if ($transaction === 'pending') {
           return true;
        } else if ($transaction === 'deny') {
            return $this->successOrFailed($order_id,false);
        } else if ($transaction === 'expire') {
            return $this->successOrFailed($order_id,false);
        } else if ($transaction === 'cancel') {
            return $this->successOrFailed($order_id,false);
        }
        return false;
    }

    public function successOrFailed($ticketId, $success)
    {
        try{
            if ($success){
                $this->TicketRepository->find($ticketId)->update([
                    'status' => 'success',
                    'kode_qr' => $this->TicketRepository->generateQr($ticketId)
                ]);
            }else{
                $this->TicketRepository->find($ticketId)->update([
                    'status' => 'failed',
                ]);
            }
            return true;
        }catch (\Exception $exception) {
            return false;
        }
    }
}
