<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
| Vercel Functions ship a read-only application filesystem. Laravel's
| runtime files therefore live in the function's disposable /tmp space.
*/
$storagePath = '/tmp/masp-storage';

foreach ([
    'app/private',
    'app/public',
    'framework/cache/data',
    'framework/sessions',
    'framework/testing',
    'framework/views',
    'logs',
] as $directory) {
    if (! is_dir($path = $storagePath.'/'.$directory)) {
        mkdir($path, 0755, true);
    }
}

foreach ([
    'LOG_CHANNEL' => 'stderr',
    'CACHE_STORE' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'QUEUE_CONNECTION' => 'sync',
    'VIEW_COMPILED_PATH' => $storagePath.'/framework/views',
] as $key => $value) {
    if (getenv($key) === false) {
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

require dirname(__DIR__).'/vendor/autoload.php';

/** @var Illuminate\Foundation\Application $app */
$app = require dirname(__DIR__).'/bootstrap/app.php';
$app->useStoragePath($storagePath);

$app->handleRequest(Request::capture());
