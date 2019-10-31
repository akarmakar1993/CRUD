<?php

namespace App\Repositories;

use App\Repositories\AbstactRepository;
use App\Ticket;

class TicketRepository extends AbstactRepository
{
    protected $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function getDataByUserId($model = NULL, $id= NULL)
    {
        return $model::where('user_id', $id)->get();
    }
}