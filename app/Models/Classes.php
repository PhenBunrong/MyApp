<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // public function subj(){
    //     return $this->hasMany(Subject::class,'class_id','id');
    // }
    // public function student(){
    //     return $this->hasMany(Student::class,'class_id','id');
    // }
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'class_teachers','class_id','teacher_id');
    } 
}
