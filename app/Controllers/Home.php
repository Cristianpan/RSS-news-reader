<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/index');
    }

    public function websitesView(): string
    {
        return view('pages/websites'); 
    }
}
