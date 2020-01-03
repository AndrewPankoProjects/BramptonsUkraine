<?php
//<!--//"StAuth10065: I Andrew Panko, 000394436 certify that this material is my original work. No other person's work has been used without due acknowledgement. I have not made my work available to anyone else."-->
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($products, $totalPrice)
    {
        $this->products = $products;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderUser');
    }
}
