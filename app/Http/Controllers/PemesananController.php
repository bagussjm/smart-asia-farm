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
        $data['tickets'] = Tiket::with(['carts' => function($c){
            $c->with(['user','playground'])->processed();
        }])->get();

        $data['pemesanan'] = count($data['tickets']->first()->carts) > 0 ? $data['tickets'] : [];


        return view('backend.pemesanan.index',$data);
    }

    public function tiketMasuk()
    {
        $data['pemesanan'] = TiketMasuk::with(['user','ticket'])->get();

//        return response()->json($data['pemesanan']);

        return view('backend.pemesanan.wahana',$data);
    }

    public function wahana()
    {

    }

    public function show($ticket)
    {
        try{
            $data['tiket'] = Tiket::with(['carts' => function($c){
                $c->with(['user','playground'])->processed();
            },'entranceTicket'])->findOrFail($ticket);
            $data['detail'] = $this->midtransRepository->orderStatus($ticket)->getOrder();
            $data['payment'] = $this->payment($data['detail']);

//            dd($data['tiket']->entranceTicket);
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
