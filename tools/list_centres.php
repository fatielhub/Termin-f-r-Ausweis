<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$centres = DB::table('centres')->get();
foreach ($centres as $c) {
    echo $c->id . ' | ' . ($c->email ?? '(no email)') . "\n";
}
