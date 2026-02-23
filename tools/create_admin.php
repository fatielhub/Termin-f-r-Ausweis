<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

$email = 'admin@example.com';
$name = 'Admin';
$password = 'password';

$admin = Admin::updateOrCreate(
    ['email' => $email],
    ['name' => $name, 'password' => Hash::make($password)]
);

echo "Admin ensured: {$admin->email} (id: {$admin->id})\n";
echo "Password set to: {$password}\n";
