<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'user_id'
    ];
    protected $primarykey = "id";

   
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class,'student_courses');
    }
    // public function student(){
    //     return $this->belongsToMany(Student::class,'student_courses');
    // }
}
