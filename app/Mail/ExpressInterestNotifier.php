<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpressInterestNotifier extends Mailable
{
    use Queueable, SerializesModels;
    public $buyername;
    public $buyeremail;
    public $buyerphone;
    public $itemid;
    public $itemtitle;
    public $selleremail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyername, $buyeremail, $buyerphone, $itemid, $itemtitle)
    {
        $this->buyername = $buyername;
        $this->buyeremail = $buyeremail;
        $this->buyerphone = $buyerphone;
        $this->itemid = $itemid;
        $this->itemtitle = $itemtitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.express-interest-notify');
    }
}
