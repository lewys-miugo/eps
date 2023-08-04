<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Campus;
use App\Models\Department;

class SuperAdminEmployeesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::whereIn('utype', ['EMP'])->orderBy('employee_no','ASC')->paginate(25);
        $campuses=Campus::all();

        return view('livewire.super-admin.super-admin-employees-component',['users'=>$users,'campuses'=>$campuses]);
    }
}
