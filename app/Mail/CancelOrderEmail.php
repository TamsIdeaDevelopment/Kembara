<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public $user;

    /**
     * CancelOrderEmail constructor.
     * @param $order
     * @param $user
     */
    public function __construct($order, $user)
    {
        $this->order = $order;
        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('CancelOrderEmail')
            ->subject('Kembara Order Declined');
    }
}
