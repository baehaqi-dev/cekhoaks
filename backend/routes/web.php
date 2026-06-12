<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyzeController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/analyze', [AnalyzeController::class, 'analyze']);