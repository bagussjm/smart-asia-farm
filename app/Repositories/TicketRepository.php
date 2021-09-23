<?php


namespace App\Repositories;


use App\Models\Tiket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TicketRepository
{
    /**
     * @param array $ticket
     * @return Collection
     * */
    public function insert(array $ticket)
    {
        return Tiket::create($ticket);
    }

}
