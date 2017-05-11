<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageOverzicht extends Event
{
    use SerializesModels;
    public $slot = [];
    public $tag = [];
    public $status = [];
    public $aanmelding = [];
    public $user = [];
    public $pdf;
    
    public function __construct($slot, $tag, $status, $aanmelding, $user, $pdf)
    {
       $this->slot = $slot;
       $this->tag = $tag;
       $this->status = $status;
       $this->aanmelding = $aanmelding;
       $this->user = $user;
       $this->pdf = $pdf;
    }

    public function broadcastOn()
    {
        return [];
    }
}
