<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\PageController;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
}
