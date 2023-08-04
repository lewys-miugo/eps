<?php

namespace App\Http\Livewire\SuperAdmin\Campus;

use Livewire\Component;
use App\Models\User;
use App\Models\Campus;
use App\Models\Department;
use Livewire\WithPagination;

class EmployeeByCampusComponent extends Component
{
    public $pageSize=12;
    public $campus_slug;
    public $orderBy= "Default";

    public $department_slug;

    public function mount($slug,$department_slug=null)
    {
        $this->slug=$slug;
        $this->department_slug =$department_slug;
    }


    public function render()
    {
        $campus_id=null;
        $campus_name="";
        // $color=;

        if ($this->department_slug) {
            $department = Department::where('slug',$this->department_slug)->first();
            // $color->$department;
            $campus_id=$department->id;
            $campus_name=$department->name;
            
        }
        
        else{
            $campus=Campus::where('slug',$this->slug)->first();
            $campus_id=$campus->id;
            $campus_name=$campus->name;
        }

        $users = User::where('campus_id',$campus_id)->paginate(12); 

        $campuses = Campus::orderBy('name','ASC')->get();
        $campus = Campus::where('slug',$this->slug)->first();

        return view('livewire.super-admin.campus.employee-by-campus-component',['users'=>$users,'campuses'=>$campuses,'campus_name'=>$campus_name,'campus'=>$campus]);
    }
}
