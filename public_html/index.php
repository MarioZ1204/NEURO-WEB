<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
 * Detect base path:
 * - Local (XAMPP):    public_html/index.php  → base = ../
 * - Hostinger:        public_html/repo/public_html/index.php → base = ../../
 */
$localBase  = __DIR__ . '/../../';
$remoteBase = __DIR__ . '/../../';

// If vendor exists two levels up (Hostinger), use that path
$base = file_exists(__DIR__ . '/../../vendor/autoload.php')
    ? __DIR__ . '/../../'
    : __DIR__ . '/../';

if (file_exists($maintenance = $base . 'storage/framework/maintenance.php')) {
    require $maintenance;
}

require $base . 'vendor/autoload.php';
$app = require_once $base . 'bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
