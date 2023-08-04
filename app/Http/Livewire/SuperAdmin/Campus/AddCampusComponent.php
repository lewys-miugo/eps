<?php

namespace App\Http\Livewire\SuperAdmin\Campus;

use Livewire\Component;
use App\Models\Campus;
use App\Models\Department;

use Illuminate\Support\Str;

use App\Models\User;

class AddCampusComponent extends Component
{
    public $name;
    public $slug;
    public $campus_id;

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


    public function storeCampus()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required' 
        ]);

        if($this->campus_id)
        {
            $department= new Department();
            $department->name = $this->name;
            $department->slug = $this->slug;
            $department->campus_id=$this->campus_id;


            $department->save();

        }

        else{
            $campus= new Campus();
            $campus->name = $this->name;
            $campus->slug = $this->slug;

            $campus->save();
        }
        
        
        session()->flash('message','New Campus / Department has been created successfully!');
    }

    public function render()
    {
        $campuses = Campus::all();
        return view('livewire.super-admin.campus.add-campus-component',['campuses'=>$campuses]);
    }
}
