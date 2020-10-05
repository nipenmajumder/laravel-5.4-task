<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student_base_infos';
    protected $fillable = ['std_name','std_father_name','std_mother_name','dept_name','blood_group','std_birth_date'];

    public function dept()
    {
        return $this->belongsTo("App\Department", "dept_name");
    }

    public function blood()
    {
        return $this->belongsTo("App\Blood", "blood_group");
    }
}
