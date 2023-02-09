<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Curriculum extends Model
{
    use HasFactory;
    protected $table = 'curriculum';
    protected $fillable = [
        'name',
        'course_id',
        'grade'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
