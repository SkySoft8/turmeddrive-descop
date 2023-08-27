<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentMail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $d;
    public function __construct($d)
    {
        $this->d = $d;
    }

}
