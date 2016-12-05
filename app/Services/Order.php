<?php 

namespace App\Service;

use App\Models\Order as OrderModel;
use App\Models\Package as PackageModel;
use Carbon\Carbon;

class Order
{

    public function getOrderDetails($request, $lang)
    {
        $packages = $request['packages'];
        $orders = [];
        $subTotal = 0;
        $grandTotal = 0;
        foreach ($packages as $packageId => $value) {
            $package = PackageModel::find($packageId);
            $packageDetail = $package->details()->where('lang', $lang)->first();
            $price = $value * $package->normal_price;
            $orders['orders'][] = [
                'packageId' => $package->id,
                'galasysProductId' => $packageDetail->galasys_product_id,
                'packageName' => $packageDetail->title,
                'qty' => $value,
                'price' => $package->normal_price,
                'total' => $price
            ];
            $subTotal += $price;
        }
        $tax = 0.1 * $subTotal;
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
            $package = PackageModel::find($packageId);
            $order->details()->create([
                'product_id' => $package->id,
                'galasys_product_id' => $package->galasys_product_id,
                'product_name' => $orderDetail['packageName'],
                'price' => $orderDetail['price'],
                'qty' => $orderDetail['qty'],
                'total_price' => $orderDetail['total']
            ]);
        }

        return $order;

    }

    public function getOrderById($orderId)
    {
        return OrderModel::find($orderId);
    }
}