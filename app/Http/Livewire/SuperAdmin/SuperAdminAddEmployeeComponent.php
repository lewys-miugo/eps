<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;


use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SuperAdminAddEmployeeComponent extends Component
{
    public $user_id;
    public $utype;
    public $full_name;
    public $email;
    public $campus;
    public $campus_id;
    public $phone_number;
    public $phone_number2;
    public $department;
    public $department_id;
    public $suspended;
    public $start_date;
    public $fired;
    // public $utype;
    public $password;

    public function addUser()
    {
        $this->validate([
            'utype' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'campus' => 'required|string|max:255',
            'campus_id' => 'required|integer',
            'phone_number' => 'required|string|max:20',
            'phone_number2' => 'nullable|string|max:20',
            'department' => 'required|string|max:255',
            'department_id' => 'required|integer',
            'suspended' => 'boolean',
            'start_date' => 'required|date',
            'fired' => 'boolean',
            'password' => 'required|string|min:8',
        ]);
        
        \App\Models\User::create([
            'utype' => $this->utype,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'campus' => $this->campus,
            'campus_id' => $this->campus_id,
            'phone_number' => $this->phone_number,
            'phone_number2' => $this->phone_number2,
            'department' => $this->department,
            'department_id' => $this->department_id,
            'suspended' => $this->suspended,
            'start_date' => $this->start_date,
            'fired' => $this->fired,
            'password' => bcrypt('plain-text-password'),
        ]);

         // Maybe emit an event or flash a session message to notify the user
         session()->flash('message', 'User successfully added.');
    }
    


    public function render()
    {
        return view('livewire.super-admin.super-admin-add-employee-component');
    }
}
