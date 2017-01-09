<?php 

namespace App\Service;

use App\Models\GalasysTicket;
use App\Models\Order as OrderModel;
use App\Models\Package as PackageModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;

class Order
{

    use DatatableParameters;

    protected $baseUrl;

    public function getOrderDetails($request, $lang)
    {
        $products = $request['products'];
        $orders = [];
        $subTotal = 0;

        foreach ($products as $code => $product) {
            $qty = $product['qty'];
            $productPrice = $product['price'];
            $price = $qty * $productPrice;
            $orders['orders'][] = [
                'packageId' => $product['id'],
                'productCode' => $code,
                'packageName' => $product['name'],
                'qty' => $qty,
                'price' => $productPrice,
                'total' => $price
            ];
            $subTotal += $price;
        }

        // $tax = 0.1 * $subTotal;
        $tax = 0;
        $orders['subTotal'] = $subTotal;
        $orders['tax'] = $tax;
        $orders['grandTotal'] = $subTotal + $tax;

        return $orders;
    }

    public function saveOrder(array $personalData, array $details)
    {
        $visitDate = Carbon::createFromFormat('l, d-m-Y', $personalData['visit_date'])->format('Y-m-d');
        $order = OrderModel::create([
            'visit_date' => $visitDate,
            'email' => $personalData['order_email'],
            'name' => $personalData['order_name'],
            'phone_number' => $personalData['order_phone'],
            'sub_total' => $details['subTotal'],
            'tax' => $details['tax'],
            'total_amount' => $details['grandTotal']
        ]);

        foreach ($details['orders'] as $orderDetail) {
            $packageId = $orderDetail['packageId'];
//            $package = PackageModel::find($packageId);
            if ($orderDetail['qty'] > 0) {
                $order->details()->create([
                    'product_id' => $packageId,
                    'galasys_product_id' => $orderDetail['productCode'],
                    'product_name' => $orderDetail['packageName'],
                    'price' => $orderDetail['price'],
                    'qty' => $orderDetail['qty'],
                    'total_price' => $orderDetail['total']
                ]);
            }
        }

        return $order;

    }

    public function getOrderById($orderId)
    {
        return OrderModel::find($orderId);
    }

    public function getOrderStatus($orderId)
    {
        $order = OrderModel::find($orderId);
        if ($order) {
            return $order->status;
        }
        return '';
    }

    public function updateStatus($orderId, $statusDesc)
    {
        switch ($statusDesc) {
            case 'open':
                $status = 0;
                break;
            case 'completed':
                $status = 1;
                break;
            case 'on-hold':
                $status = 2;
                break;
            case 'pending':
                $status = 3;
                break;
            case 'barcode-generated':
                $status = 4;
                break;
            case 'email-sent':
                $status = 5;
                break;
            case 'cancelled':
                $status = 9;
                break;
        }

        $order = $this->getOrderById($orderId);
        $order->status = $status;
        $order->status_description = $statusDesc;
        $order->save();
    }

    public function getPaidOrder()
    {
        return OrderModel::where('status', 1)->get();
    }

    public function datatableData($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        $orders = $this->getOrders();
        $actions = $this->actionParameters(['detail']);

        return (new DatatableGenerator($orders))
            ->addActions($actions)
            ->addColumn('user', function($post) {
                return $post->name;
            })
            ->addColumn('order_date', function($post) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d-M-y H:i:s');
            })
            ->addColumn('visit_date', function($post) {
                return Carbon::createFromFormat('Y-m-d', $post->visit_date)->format('l, d M Y');
            })
            ->addColumn('total', function($post) {
                return $post->total_amount;
            })
            ->addColumn('status', function($post) {
                return $post->status_description;
            })
            ->generate();
    }

    private function getOrders()
    {
        return OrderModel::all();
    }

}