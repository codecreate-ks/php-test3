<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EcShopController extends Controller
{
    public function index (Request $request)
    {
        return view('ecshop.index');
    }
}