<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeComponent;

use App\Http\Livewire\Employee\EmployeeDashboardComponent;

use App\Http\Livewire\SuperAdmin\SuperAdminDashboardComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminEmployeesComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminAddEmployeeComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminEditEmployeeComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminFiredEmployeesComponent;
use App\Http\Livewire\SuperAdmin\SuperAdminAdminsComponent;
use App\Http\Livewire\SuperAdmin\PayslipComponent;

// use App\Http\Livewire\SuperAdmin\SuperAdminAdminsComponent;

use App\Http\Livewire\SuperAdmin\Campus\CampusesComponent;

use App\Http\Livewire\SuperAdmin\Campus\AddCampusComponent;
use App\Http\Livewire\SuperAdmin\Campus\EmployeeByCampusComponent;

use App\Http\Livewire\SuperAdmin\Campus\EditCampusComponent;
use App\Http\Livewire\Employee\Campus\Campuses;




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

    // Route::get('/employee/payslip/{payslip_id}',EmployeePayslipComponent::class)->name('employee.payslip');

    Route::get('/superadmin/dashboard',SuperAdminDashboardComponent::class)->name('superadmin.dashboard');
    
    Route::get('/superadmin/add/employee',SuperAdminAddEmployeeComponent::class)->name('add.employee');

    Route::get('/superadmin/all-employees',SuperAdminEmployeesComponent::class)->name('all.employees');

    Route::get('/superadmin/employee/edit/{user_id}',SuperAdminEditEmployeeComponent::class)->name('admin.edit.employee');

    Route::get('/superadmin/fired-employees',SuperAdminFiredEmployeesComponent::class)->name('fired.employees');

    Route::get('/superadmin/administrators',SuperAdminAdminsComponent::class)->name('administrators');

    Route::get('/superadmin/campuses-&-Department',CampusesComponent::class)->name('superadmin.campuses');

    Route::get('/superadmin/add/campuses-&-Department',AddCampusComponent::class)->name('superadmin.add.campuses');

    Route::get('/superadmin/edit/campuses-&-Department/{campus_id}/{department_id?}',EditCampusComponent::class)->name('superadmin.edit.campus');

    Route::get('/superadmin/campus/employees-by-campus/{slug}/{department_slug?}',EmployeeByCampusComponent::class)->name('employees.campus');

    Route::get('/user/{id}',PayslipComponent::class)->name('employee.payslip');
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
