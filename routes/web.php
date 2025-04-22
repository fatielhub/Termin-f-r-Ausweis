<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\FaqController;

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