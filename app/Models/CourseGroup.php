<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class CourseGroup extends Model
{
    use HasFactory;
    protected $table="course_groups";
    protected $fillable=[
        'teacher_id',
        'course_id',
        'student_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function teachers()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function students()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    
}
