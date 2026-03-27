<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $campaign = App\Models\DonationCampaign::create([
        'user_id' => 1, // Change if needed
        'title' => 'Test',
        'urgency_level' => 'normale',
        'blood_types_needed' => ['A+', 'O-'],
        'expected_donors_count' => 10,
        'hospital' => 'Test',
        'slug' => 'test-123',
        'is_active' => true,
    ]);
    echo "SUCCESS: " . $campaign->id;
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n" . $e->getTraceAsString();
}
