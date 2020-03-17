<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{
    function list() {
        return view('front.list');
    }
}
