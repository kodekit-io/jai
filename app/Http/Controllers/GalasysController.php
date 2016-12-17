<?php

namespace App\Http\Controllers;

use App\Service\Galasys;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Illuminate\Http\Request;

class GalasysController extends Controller
{
    public function products()
    {
        $galasys = new Galasys();
        $products = $galasys->getProducts();
    }

}
