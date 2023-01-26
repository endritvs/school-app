<?php 

namespace App\Interfaces;

interface CourseRepositoryInterface
{
    public function getAllCourses();
    public function getCourseById($courseId);
    public function deleteCourse($courseId);
    public function storeCourse(array $courseDetails);
    public function updateCourse(array $courseDetails,$courseId);
}