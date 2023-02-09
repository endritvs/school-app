<?php 

namespace App\Repositories;
use App\Interfaces\ClassCourseGroupRepositoryInterface;
use App\Models\Class_Course_Group;

class ClassCourseGroupRepository implements ClassCourseGroupRepositoryInterface
{
    public function getAllClassCourseGroups()
    {
        return Class_Course_Group::with('courses.courses.teachers','classes')->latest()->get();
    }

    public function getClassCourseGroupById($classCourseGroupId)
    {
        return Class_Course_Group::findOrFail($classCourseGroupId);
    }

    public function deleteClassCourseGroup($classCourseGroupId)
    {
        $event=Class_Course_Group::findOrFail($classCourseGroupId);
        return $event->delete($classCourseGroupId);
    }

    public function storeClassCourseGroup(array $classCourseGroupDetails)
    {
        return Class_Course_Group::create($classCourseGroupDetails);
    }
    

    public function updateClassCourseGroups(array $classCourseGroupDetails,$classCourseGroupId)
    {
        $event=Class_Course_Group::findOrFail($classCourseGroupId);
        return $event->update($classCourseGroupDetails);
    }

}