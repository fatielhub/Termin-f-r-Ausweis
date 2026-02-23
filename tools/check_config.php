<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
echo 'env DB_CONNECTION: ' . env('DB_CONNECTION') . PHP_EOL;
echo "config database.default: " . config('database.default') . PHP_EOL;
echo "config cache.default: " . config('cache.default') . PHP_EOL;
echo "DB_DATABASE env: " . env('DB_DATABASE') . PHP_EOL;
echo "getenv DB_CONNECTION: " . getenv('DB_CONNECTION') . PHP_EOL;
echo "\n_ENV keys:\n";
foreach($_ENV as $k => $v) {
	if(str_starts_with($k, 'DB_')) echo "$k=$v\n";
}
echo "\n_SERVER keys:\n";
foreach($_SERVER as $k => $v) {
	if(str_starts_with($k, 'DB_')) echo "$k=$v\n";
}
?>