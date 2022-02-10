<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerOrderCancle extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($data)
{
    $this->data = $data;
}


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@erx.life')->subject('Order Cancle')->view('OrderMail/order_cancle_mail')->with('data', $this->data);
    }
}
