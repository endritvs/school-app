<?php 

namespace App\Repositories;
use App\Interfaces\CurriculumRepositoryInterface;
use App\Models\Curriculum;

class CurriculumRepository implements CurriculumRepositoryInterface
{
    public function getAllCurriculums()
    {
        return Curriculum::with('courses')->latest()->paginate(10);
    }

    public function getCurriculumById($curriculumId)
    {
        return Curriculum::findOrFail($curriculumId);
    }

    public function deleteCurriculum($curriculumId)
    {
        $course=Curriculum::findOrFail($curriculumId);
        return $course->delete($curriculumId);
    }

    public function storeCurriculum(array $curriculumDetails)
    {
        return Curriculum::create($curriculumDetails);
    }
    

    public function updateCurriculum(array $curriculumDetails,$curriculumId)
    {
        $course=Curriculum::findOrFail($curriculumId);
        return $course->update($curriculumDetails);
    }

}