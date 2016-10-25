<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SliderController extends Controller
{

    /**
     * SliderController constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view('backend.sliders.list');
    }

    public function anyData()
    {

    }

    public function create()
    {

    }
}
