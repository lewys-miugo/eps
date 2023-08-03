<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class SuperAdminEmployeesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::whereIn('utype', ['SADM', 'EMP', 'CADM'])->orderBy('employee_no','ASC')->paginate(25);
        return view('livewire.super-admin.super-admin-employees-component',['users'=>$users]);
    }
}
