<?php
$users = App\Models\User::all();
foreach ($users as $user) {
    $user->password = \Illuminate\Support\Facades\Hash::make('12345678');
    $user->save();
    echo "Reset password for {$user->email}\n";
}
