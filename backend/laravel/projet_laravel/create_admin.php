<?php

use Illuminate\Contracts\Console\Kernel;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(Kernel::class)->bootstrap();

$email = 'admin@test.com';
$password = 'password';

$user = App\Models\User::firstOrNew(['email' => $email]);
$user->name = 'Admin';
$user->password = $password; // Cast to hashed automatically
$user->role = 'admin';
$user->phone = '00000000';
$user->save();

echo "Admin User Created/Updated: $email / $password\n";
