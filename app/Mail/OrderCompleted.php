<?php

namespace App\Mail;

use App\Models\Order;
use Carbon\Carbon;
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
        $data['orderId'] = $this->order->id;
        $data['name'] = $this->order->name;
        $data['visitDate'] = Carbon::createFromFormat('Y-m-d', $this->order->visit_date)->format('l, d F Y');
        $data['total'] = number_format($this->order->total_amount, 0, ',', '.');
        $data['details'] = $this->order->details;
        $email = $this->view('emails.order-completed', $data);
        $tickets = $this->order->galasysTickets;
        foreach ($tickets as $ticket) {
            $email->attach(public_path($ticket->e_ticket));
        }

        return $email;
    }
}
