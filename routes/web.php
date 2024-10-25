<?php

use App\Http\Controllers\EmailAttachmentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Mail\EmailAttachment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/contact', [EmailAttachmentController::class, 'contactForm'])->name('contact');

Route::post('send-contact-email', [EmailAttachmentController::class, 'sendContactEmail'])->name('sendContactEmail');

require __DIR__.'/auth.php';

