<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\sendSms;
use App\Http\Controllers\LangueController;

Route::resource('rendezvous', RendezvousController::class);

Route::get('/', function () {
    return view('home');
});

Route::get('/precommande/type', 'App\\Http\\Controllers\\PrecommandeWebController@type')->name('precommande.type');
Route::match(['get','post'], '/precommande/step1', 'App\\Http\\Controllers\\PrecommandeWebController@step1')->name('precommande.step1');
Route::match(['get','post'], '/precommande/step2', 'App\\Http\\Controllers\\PrecommandeWebController@step2')->name('precommande.step2');
Route::match(['get','post'], '/precommande/step3', 'App\\Http\\Controllers\\PrecommandeWebController@step3')->name('precommande.step3');
Route::match(['get','post'], '/precommande/step4', 'App\\Http\\Controllers\\PrecommandeWebController@step4')->name('precommande.step4');
Route::match(['get','post'], '/precommande/recap', 'App\\Http\\Controllers\\PrecommandeWebController@recap')->name('precommande.recap');
Route::get('/suivi', 'App\\Http\\Controllers\\PrecommandeWebController@suivi')->name('precommande.suivi');

Route::get('/pre_demande', function () {
    return view('pre_demande');
})->name('pre.demande.store');

Route::get('/suivi-demande', function () {
    return view('suivi-demande');
})->name('suivi.demande');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('langue/{locale}', [LangueController::class, 'change'])->name('langue.change');
Route::get('/send-sms',[sendSms::class ,'send']);

// Route to satisfy the 'auth' middleware's redirection to a 'login' route
// This redirects to the admin login page since admin routes are using the default 'web' guard
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Admin authentication routes (login and logout)
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes (NOT protected by auth middleware)
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);

    // Authenticated admin routes
    Route::middleware(['auth:admin'])->group(function () { // Apply 'auth:admin' middleware to this nested group
        Route::get('/', function () { // Admin dashboard
            return view('admin.dashboard');
        })->name('dashboard');
        
        Route::resource('precommandes', App\Http\Controllers\Admin\PrecommandeAdminController::class);

        // Logout route (protected by auth middleware)
        Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');
    });
});

