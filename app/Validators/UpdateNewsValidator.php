<?php

namespace App\Validators;

use App\Exceptions\NewsNotFoundException;

class UpdateNewsValidator
{
    public static function existOldNews($countNews)
    {
        if (!$countNews) {
            throw new NewsNotFoundException();
        }
        
        return true;
    }
}