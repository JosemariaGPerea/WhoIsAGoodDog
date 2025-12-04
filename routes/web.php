<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerroController;

// Registro
Route::get('/register', [RegisterController::class, 'show'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Login
Route::get('/login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/mis-citas', function () { return "Mis citas"; });
    Route::get('/mis-adopciones', function () { return "Mis adopciones"; });
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Export e import rutas únicas
    Route::get('perros/export', [App\Http\Controllers\PerroController::class, 'export'])->name('perros.export');
    Route::post('perros/import', [App\Http\Controllers\PerroController::class, 'import'])->name('perros.import');

    // CRUD normal
    Route::resource('perros', App\Http\Controllers\PerroController::class);

    Route::resource('clientes', App\Http\Controllers\ClienteController::class);

    Route::get('/admin/citas', [App\Http\Controllers\CitaController::class, 'adminIndex'])->name('admin.citas');
});

Route::get('/perros/pdf/{perro}', [PerroController::class, 'downloadPdf'])->name('perros.pdf');



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
