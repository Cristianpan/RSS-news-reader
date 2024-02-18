<?php

namespace App\Exceptions;

use Exception;

class WebsiteExistsException extends Exception
{
    public function __construct()
    {
        parent::__construct('El sitio ya ha sido registrado. Por favor ingrese la URL de un sitio diferente.'); 
    }
}
