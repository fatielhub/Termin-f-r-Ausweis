<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\CentreController;

Route::resource('rendezvous', RendezvousController::class);

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('/pre_demande', function () {
    return view('pre_demande');
})->name('pre.demande.store');

Route::get('/suivi-demande', function () {
    return view('suivi-demande');
})->name('suivi.demande');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('langue/{locale}', function ($locale) {
    if (in_array($locale, ['fr', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('langue.change');

