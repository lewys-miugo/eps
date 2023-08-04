<?php

namespace App\Http\Livewire\SuperAdmin\Campus;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Department;
use Livewire\WithPagination;

class Campuses extends Component
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
        $scolor= Department::find($this->scolor_id);
        $scolor->delete();
        session()->flash('message','color has been deleted succesfully');
    }

    public function render()
    {
        $colors=Color::orderBy('name','ASC')->paginate(10);
        return view('livewire.super-admin.campus.campuses',['colors'=>$colors]);
    }
}
