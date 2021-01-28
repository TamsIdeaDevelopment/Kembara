<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HQMembershipEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $agent;

    /**
     * HQMembershipEmail constructor.
     * @param $user
     * @param $agent
     */
    public function __construct($user, $agent)
    {
        $this->user = $user;
        $this->agent = $agent;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('HQMembershipEmail')
            ->subject('Auto Reminder Agent Membership Notification');
    }
}
