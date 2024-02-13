<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlWebsites extends BaseController
{
    public function index()
    {
        return view('pages/websites/index'); 
    }
}
