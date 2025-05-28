<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\CreneauController;
use App\Http\Controllers\PrecommandeController;
use App\Http\Controllers\DocumentController;


Route::apiResource('centres', CentreController::class);
Route::apiResource('creneaux', CreneauController::class);
Route::apiResource('precommandes', PrecommandeController::class);
Route::apiResource('documents', DocumentController::class);