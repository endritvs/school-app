<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseGroup;
use App\Models\Curriculum;


class Course extends Model
{

    use HasFactory;
    protected $table="course";
    protected $fillable=['name'];

    public function courses()
    {
        return $this->hasOne(CourseGroup::class);
    }

    public function curriculum()
    {
        return $this->hasOne(Curriculum::class)->with('course');
    }
    
    public function class_course_groups()
    {
        return $this->hasMany(Class_Course_Group::class);
    }
}
