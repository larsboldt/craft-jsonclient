<?php

/**
 * Craft jsonclient plugin
 *
 * @author    dolphiq
 * @copyright Copyright (c) 2017 dolphiq
 * @link      https://dolphiq.nl/
 */

namespace dolphiq\jsonclient;

use Craft;
use dolphiq\jsonclient\twigextensions\JsonClientTwigExtension;

class JsonClientPlugin extends \craft\base\Plugin
{
    public static $plugin;

    public bool $hasCpSettings = false;

    // table schema version
    public string $schemaVersion = '1.0.0';

    public function init()
    {
        parent::init();

        self::$plugin = $this;

        Craft::$app->view->twig->addExtension(new JsonClientTwigExtension());

        Craft::info('dolphiq/jsonclient plugin loaded', __METHOD__);
    }
}
