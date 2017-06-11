<?php

namespace Tyondo\Aggregator;


use function Composer\Autoload\includeFile;

class Aggregator
{
    public static function routes()
    {
        includeFile(__DIR__.'/../Routes/web.php');
    }
}