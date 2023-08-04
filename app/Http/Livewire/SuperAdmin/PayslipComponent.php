<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;

class PayslipComponent extends Component
{
    public $employee_id;

    public function mount($id)
    {
        $this->employee_id = $id;
    }

    public function render()
    {
        $user = USer::where('id',$this->id)->first();

        return view('livewire.super-admin.payslip-component',['user'=>$user]);
    }
}
