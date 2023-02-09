<?php 

namespace App\Interfaces;

interface ClassRepositoryInterface
{
    public function getAllClasses();
    public function getClassById($classId);
    public function deleteClass($classId);
    public function storeClass(array $classDetails);
    public function updateClass(array $classDetails,$classId);
}