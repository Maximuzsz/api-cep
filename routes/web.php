<?php

use Illuminate\Support\Facades\Route;

Route::get('/search/local/{ceps}', [CepController::class, 'search']);



