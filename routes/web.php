<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use Inertia\Inertia;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/contact', [ContactController::class,'create'])->name('contact');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/contacts', [ContactController::class,'index'])->name('contacts.index');
});


Route::get('/course', [CourseController::class,'index'])->name('course');
Route::get('/course/{id}', [CourseController::class,'show'])->name('show');



require __DIR__.'/settings.php';
