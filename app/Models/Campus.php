<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $table = "campuses";

    public function departments()
    {
        return $this->hasMany(Department::class,'campus_id');
    }
}
