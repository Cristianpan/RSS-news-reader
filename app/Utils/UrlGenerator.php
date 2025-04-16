<?php

namespace App\Utils;

use Exception;

class UrlGenerator
{

    private const CACHE_BUST_FILE = "../busters.json";
    private const PUBLIC_ROUTE = "public";
    private static $cacheBustJson;

    public static function generateAssetUrl(string $filePath)
    {
        if (ENVIRONMENT === 'production' && file_exists(self::CACHE_BUST_FILE)) {
            self::loadCacheBusting();

            if (!isset(self::$cacheBustJson[self::PUBLIC_ROUTE . $filePath])) {
                throw new Exception('El archivo no existe o la ruta es inválida');
            }

            return $filePath . "?" . self::$cacheBustJson[self::PUBLIC_ROUTE . $filePath];
        }

        return $filePath;
    }

    private static function loadCacheBusting()
    {
        if (empty(self::$cacheBustJson)) {
            self::$cacheBustJson = json_decode(file_get_contents(self::CACHE_BUST_FILE), true);
        }
    }
}