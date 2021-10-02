<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Models\Keranjang;
use App\Models\TiketMasuk;
use App\Models\User;
use App\Repositories\TicketRepository;
use App\Repositories\MidtransRepository;
use Illuminate\Http\Request;
use App\Http\Resources\KeranjangResource;
use Illuminate\Support\Facades\DB;

class KeranjangApiController extends ApiController
{

    private $MidtransRepository;

    private $TicketRepository;

    public function __construct()
    {
        $this->MidtransRepository = new MidtransRepository();
        $this->TicketRepository = new TicketRepository();
    }

    public function index()
    {
        return $this->successResponse(
              KeranjangResource::collection(
                  Keranjang::with('user','playground','ticket')
                      ->get()),
            'showing keranjang'
        );
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'id_user' => 'required',
                'id_wahana' => 'required'
            ]);

            DB::beginTransaction();
            $insert = Keranjang::create([
                'id_user' => $request->id_user,
                'id_wahana' => $request->id_wahana,
                'status_keranjang' => 'belum diproses',
                'id_tiket' => null
            ]);

            if (!$insert) {
                DB::rollBack();
            } else {
                DB::commit();
                return $this->successResponse(
                    $insert
                    ,
                    'keranjang successfully created');
            }

        }catch (\Exception $e){
            return $this->errorResponse(
                [],
                $e->getMessage());
        }

        return $this->errorResponse(
            [],
            'unknown error'
        );
    }

    public function inCart(Request $request)
    {
        try{
            $request->validate([
                'id_user' => 'required',
                'id_wahana' => 'required'
            ]);

            $incart = Keranjang::where('id_user', $request->id_user)
                ->where('id_wahana',$request->id_wahana)
                ->unprocessed()
                ->count();

            if ($incart > 0){
                return $this->successResponse(
                    true,
                    'item found in chart'
                );
            }else{
                return $this->successResponse(
                    false,
                    'ite not found in chart'
                );
            }
        }catch (\Exception $e){
            return $this->errorResponse(
                false,
                $e->getMessage()
            );
        }

    }

    public function checkout(Request $request)
    {
        try{
            $request->validate([
                'order_id' => 'required',
                'user_id' => 'required',
                'book_date' => 'required|date',
                'book_time' => 'required|date_format:H:i',
                'pdf_url' => 'string|nullable'
            ]);
            $mtsOrder = $this->MidtransRepository->orderStatus($request->order_id)->getOrder();

            if (!empty($mtsOrder)){
                DB::beginTransaction();
                $ticket = $this->TicketRepository->insert([
                    'id' => $request->order_id,
                    'tanggal_masuk' => $request->book_date,
                    'jam_masuk' => $request->book_time,
                    'status' => 'pending',
                    'total_bayar' => (double)$mtsOrder->gross_amount,
                    'kode_qr' => null,
                    'instruksi_pembayaran' => $request->pdf_url
                ]);
                if ($ticket){
                    $cartUpdate = Keranjang::where('id_user',$request->user_id)
                        ->unprocessed()->update([
                            'status_keranjang' => 'diproses',
                            'id_tiket' => $request->order_id
                        ]);
                    if ($cartUpdate){
                        DB::commit();
                    }else{
                        DB::rollBack();
                    }
                }

                return $this->successResponse(
                    array(
                        'order_id' => $mtsOrder->order_id,
                        'gross_amount' => (double)$mtsOrder->gross_amount,
                        'payment_type' => $mtsOrder->payment_type,
                        'payment_instruction' => $request->pdf_url
                    ),
                    'success'
                );
            }else{
                return $this->errorResponse(
                    [],
                    'failed create ticket data, order data not found',
                    404
                );
            }

        }catch (\Exception $exception){
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

}
