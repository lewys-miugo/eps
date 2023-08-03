<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class SuperAdminAdminsComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::whereIn('utype', ['SADM','CADM'])->orderBy('employee_no','ASC')->paginate(25);

        return view('livewire.super-admin.super-admin-admins-component',['users'=>$users]);
    }
}
