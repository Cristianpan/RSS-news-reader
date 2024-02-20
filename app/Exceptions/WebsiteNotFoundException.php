<?php

namespace App\Exceptions;

use Exception;

class WebsiteNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('El sitio no existe.'); 
    }
}
