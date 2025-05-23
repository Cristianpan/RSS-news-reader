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
        $feed = static::getFeed($websiteUrl);

        $lastModified = $feed->data['headers']['last-modified'];

        $website = [
            'name' => $feed->get_title(),
            'url' => $websiteUrl,
            'icon' => $feed->get_image_url() ?? '/assets/images/rss-icon.svg',
            'updatedAt' => date('Y-m-d H:i:s', strtotime($lastModified)),
            'news' => static::getWebsiteItems($feed->get_items())
        ];

        return $website;
    }

    static public function getWebsiteDataToUpdate(string $websiteUrl, int $lastModified)
    {
        $feed = static::getFeed($websiteUrl);

        $currentLastModified = strtotime($feed->data['headers']['last-modified']);
        $hasModified = $currentLastModified === $lastModified;

        if (!$hasModified) {
            return null;
        }

        $website = [
            'updatedAt' => date('Y-m-d H:i:s', $currentLastModified),
            'news' => static::getWebsiteItems($feed->get_items())
        ];

        return $website;
    }

    static private function getFeed(string $websiteUrl)
    {
        $feed = new SimplePie();
        $feed->enable_cache(false);
        $feed->set_feed_url($websiteUrl);

        if (!$feed->init()) {
            throw new InvalidWebsiteFeedException();
        }

        return $feed;
    }

    static private function getWebsiteItems(array $items)
    {
        return array_map(function ($item) {
            return [
                'title' => $item->get_title(),
                'url' => $item->get_link(),
                'image' => $item->get_thumbnail()['url'] ?? static::getItemImage($item->get_content() ?? $item->get_description()),
                'description' => htmlspecialchars(strip_tags($item->get_content() ?? $item->get_description())),
                'date' => $item->get_date("Y-m-d"),
                'categories' => array_map(function ($category) {
                    return [
                        'name' => $category->get_term(),
                    ];
                }, $item->get_categories() ?? []),
            ];
        }, $items);
    }

    static private function getItemImage(string $content)
    {
        $pattern = '/<img[^>]*src=["\']([^"\']+)["\']/';

        preg_match($pattern, $content, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        } else {
            return '/assets/images/bg-none.svg';
        }
    }
}
