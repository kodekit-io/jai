<?php

namespace App\Console\Commands;

use App\Service\Order;
use App\Service\Ticket;
use Illuminate\Console\Command;

class SendETicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:e-ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate barcode and send e-ticket to a user';
    /**
     * @var Ticket
     */
    private $ticketService;
    /**
     * @var Order
     */
    private $orderService;

    /**
     * Create a new command instance.
     *
     * @param Ticket $ticketService
     * @param Order $orderService
     */
    public function __construct(Ticket $ticketService, Order $orderService)
    {
        parent::__construct();
        $this->ticketService = $ticketService;
        $this->orderService = $orderService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $paidOrders = $this->orderService->getPaidOrder();
        foreach ($paidOrders as $paidOrder) {
            $this->ticketService->process($paidOrder->id);
        }
    }
}
