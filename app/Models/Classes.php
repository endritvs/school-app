<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Class_Course_Group;

class Classes extends Model
{
    use HasFactory;
    protected $table='class';
    protected $fillable=[
        'class_name'
    ]; 

    public function class_course_groups()
    {
        return $this->hasMany(Class_Course_Group::class);
    }
}
