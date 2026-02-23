<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$deleted = DB::table('centres')->where('email','centre@cni.ma')->delete();
echo "Deleted rows: $deleted\n";
