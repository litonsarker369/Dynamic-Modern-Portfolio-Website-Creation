<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/project/{slug}', [FrontendController::class, 'showProject'])->name('project.show');
Route::post('/contact', [FrontendController::class, 'sendMessage'])->name('contact.send');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');

        Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
        Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
        Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

        Route::get('/social-links', [SocialLinkController::class, 'index'])->name('social-links.index');
        Route::post('/social-links', [SocialLinkController::class, 'store'])->name('social-links.store');
        Route::put('/social-links/{socialLink}', [SocialLinkController::class, 'update'])->name('social-links.update');
        Route::delete('/social-links/{socialLink}', [SocialLinkController::class, 'destroy'])->name('social-links.destroy');

        Route::get('/contact', [ContactInfoController::class, 'index'])->name('contact.index');
        Route::post('/contact', [ContactInfoController::class, 'store'])->name('contact.store');
        Route::put('/contact/{contactInfo}', [ContactInfoController::class, 'update'])->name('contact.update');
        Route::delete('/contact/{contactInfo}', [ContactInfoController::class, 'destroy'])->name('contact.destroy');

        Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about', [AboutController::class, 'update'])->name('about.update');

        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    });
});
