<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class SendMailNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $cStatus;
    public function __construct($arrayofvalue)
    {
       $this->cStatus = $arrayofvalue;
    }
    public function build()
    {
        return $this->markdown('email.customerstatus',$this->cStatus);
    }
}
