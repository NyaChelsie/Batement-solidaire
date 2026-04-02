<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Models\DonationCampaign;
=======

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

Route::get('/share/campaign/{slug}', function ($slug) {
    if (!$slug) return redirect('/');
    $campaign = DonationCampaign::where('slug', $slug)->firstOrFail();
    return view('share', compact('campaign'));
});
=======
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
