<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/announcements/create', [AnnouncementController::class, 'create'])
    ->middleware(['auth'])
    ->name('announcements.create');

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');

Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');

Route::get('/category/{category}', [AnnouncementController::class, 'index'])->name('categories.show');