<?php 

namespace App\Interfaces;

interface CourseGroupRepositoryInterface
{
    public function getAllCourseGroups();
    public function getCourseGroupById($courseGroupsId);
    public function deleteCourseGroup($courseGroupId);
    public function storeCourseGroup(array $courseGroupDetails);
    public function updateCourseGroup(array $courseGroupDetails,$courseGroupId);
}