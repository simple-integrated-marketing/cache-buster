<?php
/**
 * Simple Cache Buster plugin for Craft CMS 3.x
 *
 * Busts Cache
 *
 * @link      mark@simple.com.au
 * @copyright Copyright (c) 2018 Mark Williams
 */

namespace simplecachebuster\simplecachebuster\twigextensions;

use simplecachebuster\simplecachebuster\SimpleCacheBuster;

use Craft;

/**
 * @author    Mark Williams
 * @package   SimpleCacheBuster
 * @since     1
 */
class SimpleCacheBusterTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'SimpleCacheBuster';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('cachebust', [$this, 'cacheBust']),
        ];
    }

    public function cacheBust($file) {

        $path              = getcwd() . "/$file";
        $modification_time = filemtime($path);
        $render            = "{$file}?v={$modification_time}";
        return "/$render";

    }


}
