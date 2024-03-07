<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TechnologyController;

Route::group(['prefix' => 'v1'], function() {

    Route::get('/technologies', [TechnologyController::class, 'index']);

    Route::post('/technologies', [TechnologyController::class, 'store']);
});


