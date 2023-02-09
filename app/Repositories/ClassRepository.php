<?php 

namespace App\Repositories;
use App\Interfaces\ClassRepositoryInterface;
use App\Models\Classes;

class ClassRepository implements ClassRepositoryInterface
{
    public function getAllClasses()
    {
        return Classes::latest()->paginate(10);
    }

    public function getClassById($classId)
    {
        return Classes::findOrFail($classId);
    }

    public function deleteClass($classId)
    {
        $event=Classes::findOrFail($classId);
        return $event->delete($classId);
    }

    public function storeClass(array $classDetails)
    {
        return Classes::create($classDetails);
    }
    

    public function updateClass(array $classDetails,$classId)
    {
        $event=Classes::findOrFail($classId);
        return $event->update($classDetails);
    }

}