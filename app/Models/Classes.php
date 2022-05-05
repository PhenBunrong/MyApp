<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function teachers(){
        return $this->belongsToMany(Teacher::class,'class_teachers','class_id','teacher_id');
    } 

    public function subj(){
        return $this->belongsToMany(Subject::class,'subject_class','subject_id','class_id');
    }
}
