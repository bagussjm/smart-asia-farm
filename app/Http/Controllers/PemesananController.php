<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntranceTicketValidator;
use App\Models\Keranjang;
use App\Models\Tiket;
use App\Models\TiketMasuk;
use App\Repositories\MidtransRepository;
use App\Service\BankTransfer;
use App\Service\CardPayment;
use App\Service\EChannelPayment;
use App\Service\StorePayment;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PemesananController extends Controller
{
    private $midtransRepository;

    public function __construct(MidtransRepository $midtransRepository)
    {
        $this->midtransRepository = $midtransRepository;
    }

    public function index()
    {
        $orderData = Tiket::with(['carts' => function($c){
            $c->with(['user','playground'])->processed();
        },'entranceTicket'])
        ->orderBy('created_at','DESC')
        ->get();
        $data['tickets'] = $orderData->filter(function ($value,$key){
           return $value->carts->first() !== null && $value->entranceTicket->id !== null;
        });
//        return response()->json($data['tickets']->all());

        if (!empty($data['tickets']->all())){
            $data['pemesanan'] = count($data['tickets']->first()->carts) > 0 ? $data['tickets']->all() : [];
        }else{
            $data['pemesanan'] = [];

        }


        return view('backend.pemesanan.index',$data);
    }

    public function tiketMasuk()
    {
        $orderData = TiketMasuk::with(['user','ticket' => function($q){
            $q->with('carts');
        }])
        ->orderBy('created_at','DESC')
        ->get();
        $filteredEntranceDate = $orderData->filter(function ($value,$key){
            return $value->ticket->carts->first() === null;
        });
        $data['pemesanan'] = $filteredEntranceDate->all();

//        return response()->json($data['pemesanan']->all());

        return view('backend.pemesanan.masuk',$data);
    }

    public function wahana()
    {
        $orderData = Tiket::with(['carts' => function($c){
            $c->with(['user','playground'])->processed();
        },'entranceTicket'])
        ->orderBy('created_at','DESC')
        ->get();
        $filteredOrder = $orderData->filter(function ($value,$key){
            return $value->carts->first() !== null && $value->entranceTicket->id === null;
        });
        $data['pemesanan'] = $filteredOrder->all();
//        return response()->json($filteredOrder->all());

        return view('backend.pemesanan.wahana',$data);
    }

    public function show($ticket)
    {
        try{
            $data['tiket'] = Tiket::with(['carts' => function($c){
                $c->with(['user','playground'])->processed();
            },'entranceTicket'])->findOrFail($ticket);
            $data['detail'] = $this->midtransRepository->orderStatus($ticket)->getOrder();
            $data['payment'] = $this->payment($data['detail']);

//            return response()->json($data['tiket']);
            return view('backend.pemesanan.view',$data);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return Redirect::route('pemesanan.index')->with('error',$exception->getMessage());
        }
    }

    public function showEntranceTicketInvoice($ticket)
    {
        try{
            $data['tiket'] = Tiket::with(['entranceTicket' => function($q){
               $q->with('user');
            }])->findOrFail($ticket);
            $data['detail'] = $this->midtransRepository->orderStatus($ticket)->getOrder();
            $data['payment'] = $this->payment($data['detail']);

//            return response()->json($data['tiket']);
            return view('backend.pemesanan.invoice.tiket-masuk',$data);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return Redirect::route('pemesanan.masuk')->with('error',$exception->getMessage());
        }
    }

    public function showRidesTicketInvoice($ticket)
    {
        try{
            $data['tiket'] = Tiket::with(['carts' => function($c){
                $c->with(['user','playground'])->processed();
            },'entranceTicket'])->findOrFail($ticket);
            $data['detail'] = $this->midtransRepository->orderStatus($ticket)->getOrder();
            $data['payment'] = $this->payment($data['detail']);

//            return response()->json($data['tiket']);
            return view('backend.pemesanan.invoice.wahana',$data);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return Redirect::route('pemesanan.wahana')->with('error',$exception->getMessage());
        }
    }

    public function payment($mtsOrder)
    {
        $html = '<span></span>';
        switch ($mtsOrder->payment_type){
            case 'credit_card':
                return (new CardPayment($mtsOrder))->configure()->setOutput();
                break;
            case 'cstore':
                return (new StorePayment($mtsOrder))->configure()->setOutput();
                break;
            case 'bank_transfer':
                return (new BankTransfer($mtsOrder))->configure()->setOutput();
                break;
            case 'echannel':
                return (new EChannelPayment($mtsOrder))->configure()->setOutput();
                break;
            default:
                return $html;break;
        }

    }

    public function entranceTicket(EntranceTicketValidator $request)
    {
        DB::beginTransaction();
        try{
            TiketMasuk::updateOrCreate(
                ['tipe_tiket' => 'normal'],
                $request->validated()
            );

            DB::commit();
            return Redirect::back()->with('success','Berhasil mengupdate data tiket masuk');

        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            DB::rollBack();
            return Redirect::back()->with('error','Ada masalah saat update data tiket masuk');
        }
    }
}
