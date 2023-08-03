<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;

class SuperAdminEditEmployeeComponent extends Component
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


    public function mount($user_id)
    {
        $user = User::find($user_id);
        $this->user_id = $user->id;
        $this->full_name = $user->full_name;
        $this->campus = $user->campus;
        $this->campus_id = $user->campus_id;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->phone_number2 = $user->phone_number2;
        $this->job_grade = $user->job_grade;
        $this->salary = $user->salary;
        $this->department = $user->department;
        $this->department_id = $user->department_id;
        $this->start_date = $user->start_date;
        $this->suspended = $user->suspended;
        $this->password = $user->password;
        $this->fired = $user->fired;
        $this->utype = $user->utype;
        // $this->utype = $user->utype;
        // $this->utype = $user->utype;
        // $this->utype = $user->utype;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'utype'=>'required'
        ]);
    }

    public function updateUser()
    {
        $this->validate([
            'utype'=>'required'
        ]);

        $user=User::find($this->user_id);
        $user->utype =$this->utype;
        $user->full_name =$this->full_name;
        $user->email =$this->email;
        $user->campus =$this->campus;
        $user->campus_id =$this->campus_id;
        $user->phone_number =$this->phone_number;
        $user->phone_number2 =$this->phone_number2;
        $user->job_grade =$this->job_grade;
        $user->salary =$this->salary;
        $user->department =$this->department;
        $user->department_id =$this->department_id;
        $user->start_date =$this->start_date;
        $user->suspended =$this->suspended;
        // $user->password =$this->password;

        $user->save();
        session()->flash('message','user has been updated succesfully');
    }
    public function render()
    {
        return view('livewire.super-admin.super-admin-edit-employee-component');
    }
}
