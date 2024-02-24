<?php

namespace App\Validators;

use App\Exceptions\NewsNotFoundException;

class UpdateNewsValidator
{
    public static function existOldNews($countNews)
    {
        if ($countNews == 0) {
            throw new NewsNotFoundException();
        }
        
        return true;
    }
}