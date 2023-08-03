<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;

use App\Http\Livewire\SuperAdmin\SuperAdminDashboardComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminEmployeesComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminAddEmployeeComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminEditEmployeeComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminFiredEmployeesComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminAdminsComponent;



use App\Http\Livewire\Employee\EmployeeDashboardComponent;




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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',HomeComponent::class)->name('home.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard',EmployeeDashboardComponent::class)->name('employee.dashboard');
});

Route::middleware(['auth','authsuperadmin'])->group(function(){
    Route::get('/superadmin/dashboard',SuperAdminDashboardComponent::class)->name('superadmin.dashboard');
    
    Route::get('/superadmin/add/employee',SuperAdminAddEmployeeComponent::class)->name('add.employee');

    Route::get('/superadmin/all-employees',SuperAdminEmployeesComponent::class)->name('all.employees');

    Route::get('/superadmin/employee/edit/{user_id}',SuperAdminEditEmployeeComponent::class)->name('admin.edit.employee');

    Route::get('/superadmin/fired-employees',SuperAdminFiredEmployeesComponent::class)->name('fired.employees');

    Route::get('/superadmin/administrators',SuperAdminAdminsComponent::class)->name('administrators');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
