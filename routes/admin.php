<?php
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\News\NewsController;
use App\Http\Controllers\Dashboard\Notification\NotificationsController;
use App\Http\Controllers\Dashboard\Teacher\TeacherController;
use App\Http\Controllers\Dashboard\Session\SessionGroupController;
use App\Http\Controllers\QuranController;
use Illuminate\Support\Facades\Route;

Route::namespace('admin')->name('admin.')->group(function () {
    Route::get('/admin/sessions', [SessionGroupController::class, 'index'])->name('sessions.index');
    Route::get('/admin/sessions/create', [SessionGroupController::class, 'create'])->name('sessions.create');
    Route::post('/admin/sessions/store', [SessionGroupController::class, 'store'])->name('sessions.store');
    Route::get('/admin/sessions/edit/{id}', [SessionGroupController::class, 'edit'])->name('sessions.edit');
    Route::put('/admin/sessions/update', [SessionGroupController::class, 'update'])->name('sessions.update');
    Route::get('/admin/sessions/remove/{id}', [SessionGroupController::class, 'destroy'])->name('sessions.destroy');

    Route::get('/admin/quran', [QuranController::class, 'index'])->name('quran.index');
    Route::get('/admin/quran/create', [QuranController::class, 'create'])->name('quran.create');
    Route::post('/admin/quran/store', [QuranController::class, 'store'])->name('quran.store');
    Route::get('/admin/quran/edit/{id}', [QuranController::class, 'edit'])->name('quran.edit');
    Route::put('/admin/quran/update', [QuranController::class, 'update'])->name('quran.update');
    Route::get('/admin/quran/remove/{id}', [QuranController::class, 'destroy'])->name('quran.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/edit/{id}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/update', [TeacherController::class, 'update'])->name('teachers.update');
    Route::get('/teachers/remove/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    Route::resource('news', NewsController::class);
    Route::resource('notifications', NotificationsController::class);
});



