<?php

namespace dolphiq\jsonclient\twigextensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class JsonClientTwigExtension extends AbstractExtension
{

    static $manifestObject = null;
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'JsonClient';
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('fetchJson', [$this, 'fetchJson']),
        ];
    }

    /**
     * Returns versioned file or the entire tag.
     *
     * @param  string  $file
     * @return string
     */
    public function fetchJson($options = [])
    {
        //return \view::render('settings', []);
        // return 'twitter feed...';

        if (!isset($options['url'])) {
            die('Required url parameter not set!');
        }

        $data = self::getUrl($options['url']);

        return json_decode($data, true);
    }

    // Function for cURL
    private static function getUrl($url)
    {
        error_reporting(0);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $store = curl_exec($ch);
        curl_close($ch);

        return $store;
    }
}
