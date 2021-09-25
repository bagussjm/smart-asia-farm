<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Midtrans;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;

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
            $notificationBody = json_decode($request->getContent(), true);
            $transactionStatus = $notificationBody['transaction_status'];
           switch ($transactionStatus){
               case 'capture':
                   $this->processCaptureTransaction($notificationBody);break;
               case 'settlement':
                   $this->processSettlementTransaction($notificationBody);break;
               case 'pending':
                   Log::info('new transaction for '.$notificationBody['order_id']);
                   break;
               case 'deny':
                   Log::info('transaction '.$notificationBody['order_id'].
                       ' denied reason '.$notificationBody['status_message']);
                   $this->processExpireTransaction($notificationBody);break;
               case 'expire':
                   $this->processExpireTransaction($notificationBody);break;
               case 'cancel':
                   //TODO handle ticket data if cancel
                   break;
           }
            echo "OK";
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }

    public function processCaptureTransaction(array $notification)
    {
        $type = $notification['payment_type'];
        $fraud = $notification['fraud_status'];
        if ($type == 'credit_card') {
            if ($fraud == 'challenge') {
                Log::info('transaction is challenged by Midtrans FDS');
            } else {
                try{
                    $this->TicketRepository->find($notification['order_id'])->update([
                        'status' => 'success',
                        'kode_qr' => $this->generateQr($notification['order_id'])
                    ]);
                    Log::info('transaction '.$notification['order_id'].' is completed by user');
                }catch (\Exception $exception){
                    Log::error($exception->getMessage());
                }
            }
        }
    }

    public function processSettlementTransaction(array $notification){
        try{
            $this->TicketRepository->find($notification['order_id'])->update([
                'status' => 'success',
                'kode_qr' => $this->generateQr($notification['order_id'])
            ]);
            Log::info('transaction '.$notification['order_id'].' is completed by user');
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }

    public function processExpireTransaction(array $notification)
    {
        try{
            $this->TicketRepository->find($notification['order_id'])->update([
                'status' => 'failed'
            ]);
            Log::info('transaction '.$notification['order_id'].' is expire. ticket order canceled');
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }

    private function generateQr($ticketId)
    {
       try{
           $generator = new Generator();
           $fileName = $ticketId.'.svg';
           $svg = $generator->generate($ticketId);
           Storage::put('public/qr/'.$fileName,$svg);
           return  Storage::url('/qr/'.$fileName);
       }catch (\Exception $exception){
           Log::error($exception->getMessage());
       }
       return '';
    }

}
