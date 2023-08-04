<?php

namespace App\Http\Livewire\SuperAdmin\Campus;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Department;
use Livewire\WithPagination;


class CampusesComponent extends Component
{
    public $campus_id;
    public $department_id;



    use WithPagination;

    public function deleteCampus()
    {
        $campus= Campus::find($this->campus_id);
        $campus->delete();
        session()->flash('message','Campus has been deleted succesfully');
    }
    
    public function deleteDepartment()
    {
        $department= Department::find($this->department_id);
        $department->delete();
        session()->flash('message','Department has been deleted succesfully');
    }

    public function render()
    {
        $campuses=Campus::orderBy('name','ASC')->paginate(10);
        return view('livewire.super-admin.campus.campuses-component',['campuses'=>$campuses]);
    }
}
