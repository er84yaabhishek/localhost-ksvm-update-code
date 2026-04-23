<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    //
    public function homepage()
    {
        return view('Frontend.home');
    }
    public function contactpage()
    {
        return view('Frontend.contact');
    }
   
}
