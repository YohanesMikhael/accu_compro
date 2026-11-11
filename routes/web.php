
<?php

use App\Http\Controllers\Admin\CareerPositionController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\CompanyValueController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OperationalFacilityController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\VisionMissionController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/karir', [CareerController::class, 'index'])
    ->name('career.index');

Route::get('/karir/{slug}', [CareerController::class, 'show'])
    ->name('career.show');

// Dashboard: semua pengguna yang sudah login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Profile: semua pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// CMS: Super Admin dan Admin
Route::middleware(['auth', 'role:super_admin,admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Users
        Route::resource('users', UserController::class)->only(['index', 'store', 'update', 'destroy']);
        
        // Hero
        Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
        Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

        // About
        Route::get('/about', [CompanyProfileController::class, 'edit'])->name('about.edit');
        Route::put('/about', [CompanyProfileController::class, 'update'])->name('about.update');

        // VISI DAN MISI
        Route::get('/vision-mission', [VisionMissionController::class, 'edit']) ->name('vision-mission.edit');
        Route::put('/vision-mission', [VisionMissionController::class, 'update']) ->name('vision-mission.update');

        // Company Values
        Route::get('/our-values', [CompanyValueController::class, 'edit'])->name('our-values.edit');
        Route::post('/our-values', [CompanyValueController::class, 'store'])->name('our-values.store');
        Route::put('/our-values/{id}', [CompanyValueController::class, 'update'])->name('our-values.update');
        Route::delete('/our-values/{id}', [CompanyValueController::class, 'destroy'])->name('our-values.destroy');

        // Services
        Route::get('/services', [ServiceController::class, 'edit'])->name('services.edit');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

        // Facility
        Route::get('/operational-facilities', [OperationalFacilityController::class, 'edit'])->name('operational-facilities.edit');
        Route::post('/operational-facilities', [OperationalFacilityController::class, 'store'])->name('operational-facilities.store');
        Route::put('/operational-facilities/{id}', [OperationalFacilityController::class, 'update'])->name('operational-facilities.update');
        Route::delete('/operational-facilities/{id}', [OperationalFacilityController::class, 'destroy'])->name('operational-facilities.destroy');

        // Clients
        Route::get('/clients', [ClientController::class, 'edit'])->name('clients.edit');
        Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
        Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

        //Gallery
        Route::get('/galleries', [GalleryController::class, 'edit'])->name('galleries.edit');
        Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
        Route::put('/galleries/{id}', [GalleryController::class, 'update'])->name('galleries.update');
        Route::delete('/galleries/{id}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

        // Contact Us
        Route::get('/contact-settings', [ContactSettingController::class, 'edit'])->name('contact-settings.edit');
        Route::put('/contact-settings', [ContactSettingController::class, 'update']) ->name('contact-settings.update');

        // MENU
        Route::get('/menus', [MenuController::class, 'index']) ->name('menus.index');
        Route::patch('/menus/{id}/toggle', [MenuController::class, 'toggle'])->name('menus.toggle');

        //KARIR
        Route::get('/career-positions', [CareerPositionController::class, 'index']) ->name('career-positions.index');
        Route::get('/career-positions/create', [CareerPositionController::class, 'create'])->name('career-positions.create');
        Route::post('/career-positions', [CareerPositionController::class, 'store'])->name('career-positions.store');
        Route::get('/career-positions/{id}/edit', [CareerPositionController::class, 'edit'])->name('career-positions.edit');
        Route::put('/career-positions/{id}', [CareerPositionController::class, 'update'])->name('career-positions.update');
        Route::delete('/career-positions/{id}', [CareerPositionController::class, 'destroy'])->name('career-positions.destroy');
    });

require __DIR__.'/auth.php';
