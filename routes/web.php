<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ViewCalculation;
use App\Livewire\ListCalculation;
use App\Livewire\EditCalculation;
use App\Livewire\AddCalculation;
use App\Livewire\Dashboard;
use App\Livewire\Data\AdminData;
use App\Livewire\Data\SalesmanData;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('view_calculation', ViewCalculation::class)->name('viewCalculation');

    // New One
    Route::get('add_calculation', AddCalculation::class)->name('addCalculation');

    Route::get('salesman-data_calculation', ListCalculation::class)->name('list-calculation');
    Route::get('admin_data', AdminData::class)->name('admin-data');
    Route::get('salesman_data', SalesmanData::class)->name('salesman_data');

    Route::get('/edit-calculation/{id}', EditCalculation::class)->name('edit-calculation');
});
