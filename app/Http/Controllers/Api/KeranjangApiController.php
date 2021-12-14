<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Http\Requests\CheckoutCartRequest;
use App\Models\Keranjang;
use App\Models\TiketMasuk;
use App\Models\User;
use App\Models\Wahana;
use App\Repositories\TicketRepository;
use App\Repositories\MidtransRepository;
use Illuminate\Http\Request;
use App\Http\Resources\KeranjangResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function update(Request $request,$keranjang)
    {
        DB::beginTransaction();
        try{
            $cart = Keranjang::findOrFail($keranjang);
            $playground = Wahana::findOrFail($cart->id_wahana);
            $valid = $request->validate([
                'jumlah_pesan' => 'required|integer'
            ]);
            $grandTotal = $valid['jumlah_pesan']*$playground->tarif_tiket;

            $cart->update([
                'jumlah_pesan' => $valid['jumlah_pesan'],
                'total_harga' => $grandTotal
            ]);
            DB::commit();
            return $this->successResponse(
                $cart,
                'successfully update item in cart'
            );
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $valid = $request->validate([
                'id_user' => 'required',
                'id_wahana' => 'required',
                'jumlah_pesan' => 'required|integer'
            ]);

            $playground = Wahana::findOrFail($valid['id_wahana']);
            $grandTotal = $playground->tarif_tiket*$valid['jumlah_pesan'];

            $insert = Keranjang::create([
                'id_user' => $request->id_user,
                'id_wahana' => $request->id_wahana,
                'id_tiket' => null,
                'status_keranjang' => 'belum diproses',
                'jumlah_pesan' => $valid['jumlah_pesan'],
                'total_harga' => $grandTotal,
            ]);

            DB::commit();
            return $this->successResponse(
                $insert
                ,
                'keranjang successfully created');

        }catch (\Exception $e){
            DB::rollBack();
            return $this->errorResponse(
                [],
                $e->getMessage());
        }

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

    public function checkout(CheckoutCartRequest $request)
    {
        DB::beginTransaction();
        try{

            $mtsOrder = $this->MidtransRepository->orderStatus($request->order_id)->getOrder();

            if (!empty($mtsOrder)){

                if ($mtsOrder->payment_type === 'credit_card'){
                    $this->TicketRepository->insert([
                        'id' => $request->order_id,
                        'tanggal_masuk' => $request->book_date,
                        'jam_masuk' => $request->book_time,
                        'status' => 'success',
                        'total_bayar' => (double)$mtsOrder->gross_amount,
                        'kode_qr' => $this->generateQr($request->order_id),
                        'instruksi_pembayaran' => $request->pdf_url
                    ]);
                }else{
                    $this->TicketRepository->insert([
                        'id' => $request->order_id,
                        'tanggal_masuk' => $request->book_date,
                        'jam_masuk' => $request->book_time,
                        'status' => 'pending',
                        'total_bayar' => (double)$mtsOrder->gross_amount,
                        'kode_qr' => null,
                        'instruksi_pembayaran' => $request->pdf_url
                    ]);
                }

                switch ($request->book_type){
                    case 'A':
                        $this->processBooking($request);break;
                    case 'B':
                        $this->processEntranceTicket($request);break;
                    case 'C':
                        $this->processRidesTicket($request);break;
                }

                DB::commit();

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
            DB::rollBack();
            return $this->errorResponse(
                [],
                $exception->getMessage()
            );
        }
    }

    public function processBooking(CheckoutCartRequest $request)
    {
        $this->processEntranceTicket($request);
        $this->processRidesTicket($request);
    }

    public function processEntranceTicket(CheckoutCartRequest $request)
    {
        $grandTotal = $request->ticket_quantity*(int)env('ENTRANCE_TICKET');
        TiketMasuk::create([
            'id_tiket' => $request->order_id,
            'id_user' => $request->user_id,
            'nama_tiket_masuk' => 'Tiket Masuk',
            'harga_tiket_masuk' => (int)env('ENTRANCE_TICKET','25000'),
            'jumlah' => $request->ticket_quantity,
            'total_harga' => $grandTotal
        ]);
    }

    public function processRidesTicket(CheckoutCartRequest $request)
    {
        Keranjang::where('id_user',$request->user_id)
            ->unprocessed()->update([
                'status_keranjang' => 'diproses',
                'id_tiket' => $request->order_id
            ]);
    }

    private function generateQr($ticketId)
    {
        try{
//           $generator = new Generator();
//           $fileName = $ticketId.'.svg';
//           $svg = $generator->generate($ticketId);
//           Storage::put('public/qr/'.$fileName,$svg);
//           return  Storage::url('/qr/'.$fileName);

            $fileName = $ticketId.'.png';
            $svg = QrCode::format('png')->generate($fileName);
            Storage::put('public/qr/png/'.$fileName,$svg);
            return  Storage::url('/qr/png/'.$fileName);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
        return '';
    }

    public function delete($keranjang)
    {
        DB::beginTransaction();
        try{
            $item = Keranjang::findOrFail($keranjang);
            $item->delete();
            DB::commit();
            return $this->successResponse(
                $keranjang,
                'successfully removed item in cart'
            );
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }

}
