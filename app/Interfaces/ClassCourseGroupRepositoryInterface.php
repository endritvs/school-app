<?php 

namespace App\Interfaces;

interface ClassCourseGroupRepositoryInterface
{
    public function getAllClassCourseGroups();
    public function getClassCourseGroupById($classCourseGroupId);
    public function deleteClassCourseGroup($classCourseGroupId);
    public function storeClassCourseGroup(array $classCourseGroup);
    public function updateClassCourseGroups(array $classCourseGroup,$classCourseGroupId);
}