<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::get('/lavora-con-noi', [PublicController::class, 'becomeRevisorForm'])->name('become.revisor.form');
    Route::post('/lavora-con-noi/submit', [PublicController::class, 'becomeRevisorSubmit'])->name('become.revisor.submit');
});

Route::middleware(['auth', 'isRevisor'])->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/revisor/accept/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept');
    Route::patch('/revisor/reject/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject');
    Route::patch('/revisor/undo', [RevisorController::class, 'undo'])->name('revisor.undo');
});

Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('/category/{category}', [AnnouncementController::class, 'index'])->name('categories.show');
