<?php 

namespace App\Interfaces;

interface CurriculumRepositoryInterface
{
    public function getAllCurriculums();
    public function getCurriculumById($curriculumId);
    public function deleteCurriculum($curriculumId);
    public function storeCurriculum(array $curriculumDetails);
    public function updateCurriculum(array $curriculumDetails,$curriculumId);
}