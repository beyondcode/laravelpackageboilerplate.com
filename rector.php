<?php

use Rector\Config\RectorConfig;
use RectorLaravel\Set\LaravelLevelSetList;

return RectorConfig::configure()
    ->withPaths([__DIR__.'/app', __DIR__.'/config', __DIR__.'/database', __DIR__.'/routes', __DIR__.'/tests'])
    ->withPhpSets(php85: true)
    ->withSets([LaravelLevelSetList::UP_TO_LARAVEL_130]);
