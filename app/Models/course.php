<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'student_id'
    ];
    public function student(){
        return $this->belongsToMany(Student::class,'student_courses');
    }
    // public function courses(){
    //     return $this->belongsToMany(Course::class,'student_courses');
    // }
}
