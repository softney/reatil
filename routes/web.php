<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;

use App\Http\Livewire\Products;
use App\Http\Livewire\Coins;
use App\Http\Livewire\Clients;
use App\Http\Livewire\Orders;
use App\Http\Livewire\Sales;
use App\Http\Livewire\Reports;

use App\Http\Livewire\Roles;
use App\Http\Livewire\Permissions;
use App\Http\Livewire\Assignments;
use App\Http\Livewire\Users;

use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::get('dashboards', [DashboardController::class, 'index']);
    
    Route::get('products', Products::class);
    Route::get('coins', Coins::class);
    Route::get('clients', Clients::class);
    Route::get('orders', Orders::class);
    Route::get('sales', Sales::class);
    Route::get('reports', Reports::class);

    Route::get('roles', Roles::class);
    Route::get('permissions', Permissions::class);
    Route::get('assignments', Assignments::class);
    Route::get('users', Users::class);

    /* REPORTES EXCEL */
    Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportExcel']);
    Route::get('report/excel/{user}/{type}', [ExportController::class, 'reportExcel']);

});
