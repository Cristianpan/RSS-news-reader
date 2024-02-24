<?php

namespace App\Exceptions;

use Exception;

class NewsNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('No hay noticias nuevas Por actualizar el día de hoy. Actualice en otro momento.');
    }
}