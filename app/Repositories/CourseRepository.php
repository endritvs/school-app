<?php 

namespace App\Repositories;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAllCourses()
    {
        return Course::latest()->paginate(10);
    }

    public function getCourseById($courseId)
    {
        return Course::findOrFail($courseId);
    }

    public function deleteCourse($courseId)
    {
        $course=Course::findOrFail($courseId);
        return $course->delete($courseId);
    }

    public function storeCourse(array $courseDetails)
    {
        return Course::create($courseDetails);
    }
    

    public function updateCourse(array $courseDetails,$courseId)
    {
        $course=Course::findOrFail($courseId);
        return $course->update($courseDetails);
    }

}