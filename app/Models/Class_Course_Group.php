<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Classes;

class Class_Course_Group extends Model
{
    use HasFactory;
    protected $table="class_course_group";
    protected $fillable=[
        'class_id',
        'course_id',
        'date_start',
        'date_end'
    ];
    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id','id');
    }
}
