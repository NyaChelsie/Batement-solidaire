<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$admin = App\Models\User::where('role', 'admin')->first();
if ($admin) {
    $admin->password = Illuminate\Support\Facades\Hash::make('password');
    $admin->save();
    echo "Password reset to 'password' for " . $admin->email . "\n";
} else {
    echo "NO_ADMIN_FOUND\n";
}
