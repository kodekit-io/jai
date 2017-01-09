<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    private $order;

    /**
     * Create a new message instance.
     *
     * @param $orderId
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.order-completed');
//        $tickets = $this->order->galasysTickets;
//        foreach ($tickets as $ticket) {
//            $email->attach(public_path($ticket->e_ticket));
//        }

        return $email;
    }
}
