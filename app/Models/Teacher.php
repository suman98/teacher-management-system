<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    
    protected $fillable = [ 'name', 'gender', 'phone_number', 'email', 'address', 'nationality', 'faculty_id', 'dob'];

    public static function getValidateRule($id = false)
    { //pass id at edit

        $validation_rule = [

            'name' => 'required|min:2',
            'gender' => 'required|min:1',
            'phone_number' => 'required|integer|min:7',
            'email' => 'email:rfc|unique:teachers,'.$id,
            'address'=>'required',
            'nationality'=>'required',
            'dob'=>'required',
            'faculty_id'=>'required',
            'courses_id'=>'required',

        ];
 
        return $validation_rule;
    }

    public function getGender(){

        if($this->gender == 'M'){
            return 'Male';
        }
        if($this->gender == 'F'){
            return 'Female';
        }
        return '';

    }

    public function getNation()
    {
        return $this->belongsTo(\App\Models\Nationality::class, 'nationality');
    }

    public function faculty()
    {
        return $this->belongsTo(\App\Models\Faculty::class, 'faculty_id');
    }
    

    public function teacher_courses()
    {
        return $this->hasMany(\App\Models\TeacherCourses::class, 'teacher_id', 'id');
    }
}
