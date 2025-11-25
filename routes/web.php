<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'roles:2'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dash');
    });

    Route::controller(DocumentsController::class)->group(function(){
        Route::get('/admin/documents', 'DocumentManage')->name('document.dash');
        Route::get('/admin/documents/add', 'DocumentAdd')->name('document.add');
        Route::post('/admin/documents/store', 'DocumentStore')->name('document.store');
        
        Route::get('/admin/documents-revisions', 'RevisedDocuments')->name('revise.docs');
        Route::post('/admin/documents-revisions/store', 'RevisedDocumentsStore')->name('revise.store');
        Route::get('/admin/documents-revisions/active/{id}', 'RevisedDocumentActive')->name('revise.setActive');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';