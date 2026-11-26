<?php
/**
 * Post-deploy script for Hostinger
 * Run after each git deployment to clear Laravel caches
 *
 * CLI: php deploy.php
 * HTTP: blocked by repo/.htaccess; if reachable, requires DEPLOY_TOKEN
 */

if (php_sapi_name() !== 'cli') {
    $token = (string) ($_GET['token'] ?? '');
    $expected = (string) (getenv('DEPLOY_TOKEN') ?: '');

    if ($expected === '' || $token === '' || !hash_equals($expected, $token)) {
        http_response_code(403);
        exit('Forbidden');
    }
}

$base = dirname(__FILE__);
chdir($base);

$commands = [
    'php artisan migrate --force --no-interaction',
    'php artisan cache:clear',
    'php artisan config:clear',
    'php artisan route:clear',
    'php artisan view:clear',
    'php artisan config:cache',
    'php artisan route:cache',
    'php artisan view:cache',
    'php artisan storage:link',
];

foreach ($commands as $cmd) {
    $output = shell_exec($cmd . ' 2>&1');
    echo $cmd . "\n" . $output . "\n";
}

echo "Deploy post-script completed.\n";
