<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function cart()
    {
        return view('pages/user/cart');
    }

}
