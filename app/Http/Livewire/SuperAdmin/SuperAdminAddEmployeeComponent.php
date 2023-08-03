<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use App\Models\Campus;



use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SuperAdminAddEmployeeComponent extends Component
{
    public $user_id;
    public $utype;
    public $employee_no;
    public $full_name;
    public $email;
    public $campus;
    public $campus_id;
    public $phone_number;
    public $phone_number2;
    public $department;
    public $department_id;
    public $suspended=0;
    public $start_date;
    public $fired='0';
    // public $utype;
    public $password;

    public function mount()
    {
        $this->generateEMPno();
    }

    public function generateEMPno() {
        $fourDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $timestamp = now()->timestamp;
    
        $this->employee_no = "EMP" . $fourDigits . $timestamp;
    }

    public function updatedFullName($value)
        {
            // This method will be called each time the "full_name" property is updated
            $this->email = $this->generateEmail($value);
        }

    public function generateEmail($full_name) {
        // Replace any spaces in the employee name with a period (.)
        $formatted_name = strtolower(str_replace(' ', '.', $full_name));

        $random_number = rand(100, 999);
    
        // Concatenate the formatted name, employee number, and domain
        $email = $formatted_name . $random_number . '@epsjkuat.com';
    
        return $email;

    }
    

    public function addUser()
    {
        $this->validate([
            'utype' => 'required|string|max:255',
            // 'full_name' => 'required|string|max:255',
            // 'employee_no'=>'required',
            // 'email' => 'required|email|unique:users,email',
            // 'campus' => 'required|string|max:255',
            // 'campus_id' => 'required|integer',
            // 'phone_number' => 'required|string|max:20',
            // 'phone_number2' => 'nullable|string|max:20',
            // 'department' => 'required|string|max:255',
            // 'department_id' => 'required|integer',
            // 'suspended' => 'boolean',
            // 'start_date' => 'required|date',
            // 'fired' => 'boolean',
            // 'password' => 'required|string|min:8',
        ]);


        
        $user = new User();
        $user->utype = $this->utype;
        $user->full_name = $this->full_name;
        $user->employee_no = $this->employee_no;
        $user->email = $this->email;
        // $user->campus = $this->campus;
        $user->campus_id = $this->campus_id;
        $user->phone_number = $this->phone_number;
        // $user->phone_number2 = $this->phone_number2;
        // $user->department = $this->department;
        // $user->department_id = $this->department_id;
        // $user->suspended = $this->suspended;
        $user->start_date = $this->start_date;
        $user->fired = $this->fired;
        $user->password = bcrypt('password@eps');
        $user->save();

        session()->flash('message', 'User successfully added.');

        // Maybe emit an event or flash a session message to notify the user

        
    }
    


    public function render()
    {
        $campuses=Campus::orderBy('campus_name','ASC')->get();

        return view('livewire.super-admin.super-admin-add-employee-component',['campuses'=>$campuses]);
    }
}
