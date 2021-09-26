<?php


namespace App\Repositories;


use App\Models\Tiket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Exception;

class TicketRepository
{
    private $ticket;

    /**
     * @param array $ticket
     * @return boolean
     * @throws Exception
     */
    public function insert(array $ticket)
    {
        try{
            Log::info('ticket created'. json_encode($ticket));
            return Tiket::create($ticket);
        }catch (Exception $exception){
            Log::info($exception->getMessage());
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @param int
     * @return TicketRepository
     * */
    public function find($ticketId)
    {
       try{
           $this->ticket = Tiket::findOrFail($ticketId);
           return $this;
       }catch (\Exception $exception){
           $this->ticket = $exception;
           return $this;
       }
    }

    public function all()
    {
        $this->ticket = $this->model->all();
        return $this;
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function get()
    {
        if ($this->ticket instanceof Exception){
            throw new \Exception($this->ticket->getMessage());
        }
        return $this->ticket;
    }

    /**
     * @param array $ticketUpdate
     * @return boolean
     * @throws Exception
     */
    public function update($ticketUpdate)
    {
        if ($this->ticket instanceof Exception){
            throw new \Exception($this->ticket->getMessage());
        }else{
            try{
                Log::info('update ticket : '.json_encode($this->ticket));
                return $this->ticket->update($ticketUpdate);
            }catch (\Exception $exception){
                throw new \Exception($exception->getMessage());
            }
        }
    }

    /**
     * @param int $ticketId
     * @return string
    */
    public function generateQr($ticketId)
    {
        $fileName = $ticketId.'.svg';
        $svg = QrCode::generate($ticketId);
        Storage::put('public/qr/'.$fileName,$svg);
        return  Storage::url('/qr/'.$fileName);
    }
}
