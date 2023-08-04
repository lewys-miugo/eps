<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class EmployeePayslipComponent extends Component
{
    public $employee_id;

    public function mount($id)
    {
        $this->employee_id = $id;
    }

    public function render()
    {
        $user = USer::where('id',$this->employee_id)->first();
        return view('livewire.employee.employee-payslip-component',['user'=>$user]);
    }
}
