<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\ProjectManagementController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// ============ HALAMAN LOGIN ============
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ============ HALAMAN PUBLIK ============
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/project', [ProjectController::class, 'index'])->name('projects');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.detail');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak/kirim', [ContactController::class, 'sendMessage'])->name('contact.send');

// ============ ADMIN DASHBOARD ============
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Profile & Beranda
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Skills
    Route::resource('skills', SkillController::class);
    
    // Achievements
    Route::resource('achievements', AchievementController::class);
    
    // Projects (pakai ProjectManagementController)
    Route::resource('projects', ProjectManagementController::class);
    
    // Gallery
    Route::resource('galleries', GalleryController::class);
    
    // Social Links
    Route::resource('social-links', SocialLinkController::class);
    
    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::patch('/messages/{id}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
});