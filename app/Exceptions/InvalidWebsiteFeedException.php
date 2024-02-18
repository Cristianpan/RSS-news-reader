<?php

namespace App\Exceptions;

use Exception;

class InvalidWebsiteFeedException extends Exception
{
    public function __construct()
    {
        parent::__construct('La URL del sitio parece que no es correcta. Por favor verifique la URL e intente nuevamente.'); 
    }
}
