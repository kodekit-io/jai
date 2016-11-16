<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function dokuResult(Request $request)
    {
        var_dump($request->all());
    }

    public function dokuNotify(Request $request)
    {
        var_dump($request->all());
    }

    public function dokuReview(Request $request)
    {
        var_dump($request->all());
    }

}
