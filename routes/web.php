<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(DocumentController::class)->group(function(){
    Route::post('/document/store', 'DocumentStore')->name('docs.store');
});