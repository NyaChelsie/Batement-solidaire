<?php
$p = 'secret';
$u1 = new App\Models\User(['email' => 't1' . rand() . '@t', 'name' => 't', 'password' => \Illuminate\Support\Facades\Hash::make($p)]);
$u2 = new App\Models\User(['email' => 't2' . rand() . '@t', 'name' => 't', 'password' => $p]);

echo "With Hash::make: " . (\Illuminate\Support\Facades\Hash::check($p, $u1->password) ? 'YES' : 'NO') . "\n";
echo "Without Hash::make: " . (\Illuminate\Support\Facades\Hash::check($p, $u2->password) ? 'YES' : 'NO') . "\n";
