<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageTicket extends Event
{
    use SerializesModels;
    public $ticket = [];
    public $maaltijd = [];
    public $user = [];
    public $pdf;
    
    public function __construct($ticket, $maaltijd, $user, $pdf)
    {
       $this->ticket = $ticket;
       $this->maaltijd = $maaltijd;
       $this->user = $user;
       $this->pdf = $pdf;
    }
    public function broadcastOn()
    {
        return [];
    }
}
