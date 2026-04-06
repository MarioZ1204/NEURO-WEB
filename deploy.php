<?php
/**
 * Post-deploy script for Hostinger
 * Run after each git deployment to clear Laravel caches
 */

// Security: only allow execution from CLI or with secret token
if (php_sapi_name() !== 'cli') {
    $token = $_GET['token'] ?? '';
    $expected = getenv('DEPLOY_TOKEN') ?: 'change-this-secret';
    if (!hash_equals($expected, $token)) {
        http_response_code(403);
        exit('Forbidden');
    }
}

$base = dirname(__FILE__);
chdir($base);

$commands = [
    'php artisan config:cache',
    'php artisan route:cache',
    'php artisan view:cache',
];

foreach ($commands as $cmd) {
    $output = shell_exec($cmd . ' 2>&1');
    echo $cmd . "\n" . $output . "\n";
}

echo "Deploy post-script completed.\n";
