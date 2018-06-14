<?php
/**
 * Simple Cache Buster plugin for Craft CMS 3.x
 *
 * Busts Cache
 *
 * @link      mark@simple.com.au
 * @copyright Copyright (c) 2018 Mark Williams
 */

namespace simplecachebuster\simplecachebuster;

use simplecachebuster\simplecachebuster\twigextensions\SimpleCacheBusterTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class SimpleCacheBuster
 *
 * @author    Mark Williams
 * @package   SimpleCacheBuster
 * @since     1
 *
 */
class SimpleCacheBuster extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var SimpleCacheBuster
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new SimpleCacheBusterTwigExtension());

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'simple-cache-buster',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
