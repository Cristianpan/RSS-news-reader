<?php

namespace App\Validators;

use App\Exceptions\WebsiteExistsException;
use App\Exceptions\WebsiteHasNotNewsException;
use App\Models\Websites;

class WebsiteValidator
{
    public static function existWebsite($websiteName)
    {
        $result = (new Websites())->where('name', $websiteName)->find();
        
        if (!empty($result)) {
            throw new WebsiteExistsException();
        }

        return true;
    }

    public static function hasNews($news) {
        if (empty($news)) {
            throw new WebsiteHasNotNewsException(); 
        }

        return true; 
    }
}
