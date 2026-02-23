<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
try {
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::table('creneau')->truncate();
    DB::table('centres')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
    echo "Truncated tables: creneau, centres\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
