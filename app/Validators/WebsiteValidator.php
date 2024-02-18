<?php

namespace App\Validators;

use App\Exceptions\WebsiteExistsException;
use App\Models\Websites;

class WebsiteValidator
{
    public static function existWebsite($websiteName)
    {
        $result = (new Websites())->where('name', $websiteName)->find(); 

        if ($result) {
            throw new WebsiteExistsException();
        }

        return true;
    }
}
