<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class SuperAdminFiredEmployeesComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::whereIn('utype', ['FEMP'])->orderBy('employee_no','ASC')->paginate(25);
        return view('livewire.super-admin.super-admin-fired-employees-component',['users'=>$users]);
    }
}
