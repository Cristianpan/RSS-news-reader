<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlNews extends BaseController
{
    public function index()
    {
        return view('pages/news/index');
    }
}
