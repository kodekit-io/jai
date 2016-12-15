<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        return view('backend.settings.general-setting');
    }

    public function save(Request $request)
    {
        
    }
}
