<?php

namespace App\Utils;

use App\Exceptions\InvalidWebsiteFeedException;
use SimplePie\SimplePie;


class SimplePieManager
{
    /**
     * Return the website data such ass associative array 
     * 
     * [
     *  'name' => '', 
     *  'url' => '', 
     *  'icon' => '',
     *  'websites' => [
     *      [
     *          'title' => ''
     *          'url' => ''
     *          'image' => ''
     *          'description' => ''
     *          'date' => ''
     *          'categories' => [['name']...]
     *      ], 
     *      .
     *      .
     *      .
     *  ] 
     * ]
     * 
     *
     * @param string $websiteUrl
     * @return array 
     */
    static public function getWebsiteData(string $websiteUrl): array
    {
        $feed = new SimplePie();
        $feed->enable_cache(false);
        $feed->set_feed_url($websiteUrl);

        if (!$feed->init()) {
            throw new InvalidWebsiteFeedException();
        }
        
        $website = [
            'name' => $feed->get_title(),
            'url' => $websiteUrl,
            'icon' => $feed->get_image_url()
        ];
        
        $website['news'] = array_map(function ($item) {
            return [
                'title' => $item->get_title(),
                'url' => $item->get_link(),
                'icon' => static::getItemImage($item->get_content()),
                'description' => htmlspecialchars(strip_tags($item->get_description())),
                'date' => $item->get_date("d/m/Y"),
                'categories' => array_map(function ($category) {
                    return [
                        'name' => $category->get_term(),
                    ];
                }, $item->get_categories() ?? []),
            ];
        }, $feed->get_items());
    
        return $website;
    }

    static private function getItemImage(string $content)
    {
        $pattern = '/<img[^>]*src=["\']([^"\']+)["\']/';

        preg_match($pattern, $content, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        } else {
            return null;
        }
    }
}
