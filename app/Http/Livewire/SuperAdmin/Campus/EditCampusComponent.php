<?php

namespace App\Http\Livewire\SuperAdmin\Campus;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Department;
// use App\Http\Livewire\CampusComponent;
// use App\Http\Livewire\EmployeeByCampusComponent;
use Illuminate\Support\Str;

class EditCampusComponent extends Component
{
    public $campus_id;
    public $name;
    public $slug;
    public $department_id;
    public $department_slug;


    public function mount($campus_id,$department_id=null)
    {
        if($department_id)
        {
            $department=Department::where('id',$department_id)->first();
            // $department = Department::find($department_id);

            $this->department_id = $department->id;
            $this->campus_id = $department->campus_id;
            $this->name = $department->name;
            $this->slug = $department->slug;
        }
        else
        {
            $campus=Campus::where('id',$campus_id)->first();
            // $campus=campus::where('id',$this->id)->first();
            // $campus = campus::find($campus_id);
            $this->campus_id = $campus->id;
            $this->name = $campus->name;
            $this->slug = $campus->slug;
        }
    }

    public function generateSlug()
    {
        $this->slug=Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required'
        ]);
    }

    public function updateCampus()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);

        if ($this->department_id) {
            $department = Department::find($this->department_id);
            $department->name=$this->name;
            $department->slug =$this->slug;
            $department->campus_id = $this->campus_id;

            $department->save();
        }

        else
        {
            
            $campus=Campus::find($this->campus_id);
            $campus->name=$this->name;
            $campus->slug =$this->slug;

            $campus->save();
        }
        
        session()->flash('message','Campus has been updated succesfully');
    }


    public function render()
    {
        $campuses=Campus::all();
        return view('livewire.super-admin.campus.edit-campus-component',['campuses'=>$campuses]);
    }
}
