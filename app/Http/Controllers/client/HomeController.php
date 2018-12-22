<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index()
    {
        return view('client.home.index');
    }

    function Socola()
    {
        return view('client.home.socola');
    }
}
