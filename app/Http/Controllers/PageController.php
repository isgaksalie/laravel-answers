<?php

namespace App\Http\Controllers;

Class PageController extends Controller
{
    public function about()
    {
        return "This is the about page";
    }

    public function contact()
    {
        return 'contact Page';
    }
}