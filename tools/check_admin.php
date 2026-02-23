<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;

$email = 'admin@example.com';
$admin = Admin::where('email', $email)->first();
if ($admin) {
    echo "Found admin: id={$admin->id}, name={$admin->name}, email={$admin->email}\n";
} else {
    echo "Admin not found: {$email}\n";
}
