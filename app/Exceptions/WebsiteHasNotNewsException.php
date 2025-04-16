<?php 
namespace App\Exceptions;

use Exception;

class WebsiteHasNotNewsException extends Exception {
    public function __construct()
    {
        parent::__construct('No es posible registrar el sitio ya que no cuenta con noticias. Por favor ingrese otro sitio.'); 
    }
}