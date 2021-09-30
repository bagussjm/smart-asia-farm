<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Tiket;
use App\Repositories\MidtransRepository;
use App\Service\BankTransfer;
use App\Service\CardPayment;
use App\Service\EChannelPayment;
use App\Service\StorePayment;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
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
        $data['pemesanan'] = Tiket::with(['carts' => function($c){
            $c->with(['user','playground'])->processed();
        }])->get();

        return view('backend.pemesanan.index',$data);
    }

    public function show($ticket)
    {
        try{
            $data['tiket'] = Tiket::with(['carts' => function($c){
                $c->with(['user','playground'])->processed();
            }])->findOrFail($ticket);
            $data['detail'] = $this->midtransRepository->orderStatus('1631949268239-1631949273506')->getOrder();
            $data['payment'] = $this->payment($data['detail']);

//            dd($data['payment']);
//            dd($data['payment']);

            return view('backend.pemesanan.view',$data);
        }catch (\Exception $exception){
            return Redirect::route('pemesanan.index')->with('error',$exception->getMessage());
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
}
