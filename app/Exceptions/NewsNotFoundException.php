<?php

namespace App\Exceptions;

use Exception;

class NewsNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('No hay noticias por actualizar el día de hoy. Por favor actualice en otro momento.');
    }
}