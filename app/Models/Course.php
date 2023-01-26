<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseGroup;


class Course extends Model
{

    use HasFactory;
    protected $table="course";
    protected $fillable=['name'];

    public function course()
    {
        return $this->hasOne(CourseGroup::class);
    }
}
