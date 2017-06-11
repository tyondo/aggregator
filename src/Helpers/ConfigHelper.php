<?php
namespace Tyondo\Aggregator\Helpers;

use Larapack\ConfigWriter\Repository as ConfigWriter;

class ConfigHelper
{
    // Config
    const FILENAME = 'aggregator.php';
    /**
     * Get config writer instance.
     */
    public static function getWriter()
    {
        return new ConfigWriter(basename(self::FILENAME, '.php'));
    }
}