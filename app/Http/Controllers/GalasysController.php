<?php

namespace App\Http\Controllers;

use App\Service\Galasys;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Illuminate\Http\Request;

class GalasysController extends Controller
{
    /**
     * @var Galasys
     */
    private $galasysService;

    /**
     * GalasysController constructor.
     * @param Galasys $galasysService
     */
    public function __construct(Galasys $galasysService)
    {
        $this->galasysService = $galasysService;
    }

    public function products()
    {
        $products = $this->galasysService->getProducts();
        echo 'satu';
        var_dump($products);
        usort($products, function($a, $b) {
            if ($a->BasePrice == $b->BasePrice) return 0;
            if ($a->BasePrice > $b->BasePrice) {
                return 1;
            } else {
                return -1;
            }
        });
        echo 'dua';
        var_dump($products); exit();
    }

}
