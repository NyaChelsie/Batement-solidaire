<?php
// routes/api.php
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\PublicController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\DonationCenterController;
use Illuminate\Support\Facades\Log;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
<<<<<<< HEAD

// Passwordless OTP Login (Phase 6)
Route::post('/login/otp/request', [AuthController::class, 'loginOtpRequest']);
Route::post('/login/otp/verify', [AuthController::class, 'loginOtpVerify']);
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Illuminate\Http\Request $request) {
    return $request->user();
});

// Routes donateurs (protégées)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/user', [AuthController::class, 'updateProfile']);
    Route::post('/subscribe', [\App\Http\Controllers\API\SubscriptionController::class, 'store']);
    Route::get('/my-subscription', [\App\Http\Controllers\API\SubscriptionController::class, 'mySubscription']);

    // Rendez-vous
    Route::get('/donation-centers', [DonationCenterController::class, 'index']);
    Route::get('/appointments/my', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::put('/appointments/{id}/cancel', [AppointmentController::class, 'cancel']);
});

// Routes publiques
Route::prefix('public')->group(function () {
<<<<<<< HEAD
    Route::get('/campaigns/active-emergency', [PublicController::class, 'getActiveEmergency']);
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
    Route::get('/campaigns/featured', [PublicController::class, 'getFeaturedCampaigns']);
    Route::get('/campaigns', [PublicController::class, 'getAllCampaigns']);
    Route::get('/campaign/{slug}', [PublicController::class, 'getCampaignDetails']);
    Route::post('/donate', [PublicController::class, 'processDonation']);
<<<<<<< HEAD
    Route::get('/centers', [PublicController::class, 'getCenters']);
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
    Route::get('/objectives', [\App\Http\Controllers\API\ObjectiveController::class, 'index']);
    Route::get('/updates', [\App\Http\Controllers\API\UpdateController::class, 'index']);
});

// Routes admin (protégées)
Route::prefix('admin')->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/dashboard/stats', [AdminController::class, 'dashboardStats']);
    Route::get('/users', [AdminController::class, 'getUsers']); // Changed from beneficiaries
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser']); // New
    Route::post('/campaigns', [AdminController::class, 'createCampaign']);
    Route::get('/campaigns', [AdminController::class, 'getCampaigns']);
    Route::put('/campaigns/{id}', [AdminController::class, 'updateCampaign']);
    Route::delete('/campaigns/{id}', [AdminController::class, 'deleteCampaign']);
    
    Route::get('/appointments', [AdminController::class, 'getAppointments']);
    Route::get('/blood-stocks', [AdminController::class, 'getBloodStocks']);
});


// Routes infirmier (protégées)
<<<<<<< HEAD
Route::prefix('nurse')->middleware(['auth:sanctum', 'role:infirmier'])->group(function () {
=======
Route::prefix('nurse')->group(function () {
    // We are skipping middleware 'role:infirmier' for simplicity of the prototype, but it can be added
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
    Route::get('/appointments/qr/{codeData}', [\App\Http\Controllers\API\NurseController::class, 'getAppointmentByQR']);
    Route::post('/appointments/{id}/complete', [\App\Http\Controllers\API\NurseController::class, 'completeDonation']);
});