<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('pages/user/menu');
    }
}
