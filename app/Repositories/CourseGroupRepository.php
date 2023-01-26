<?php 

namespace App\Repositories;
use App\Interfaces\CourseGroupRepositoryInterface;
use App\Models\CourseGroup;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseGroupRepository implements CourseGroupRepositoryInterface
{

    public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function getAllCourseGroups()
    {
        $courseGroup=CourseGroup::with('teachers','students','course')->get()->groupBy('course_id');
        $courseGroup=$this->paginate($courseGroup,5);
        $courseGroup->withPath('/dashboard/course/groups');
        return $courseGroup;
    }

    public function getCourseGroupById($courseGroupId)
    {
        return CourseGroup::with('teachers','students','course')->findOrFail($courseGroupId);
    }

    public function deleteCourseGroup($courseId)
    {
       return CourseGroup::where('course_id', $courseId)->delete();
    }

    public function storeCourseGroup(array $courseGroupDetails)
    {
        $teachers=$courseGroupDetails['teacher_id'];   
        $students=$courseGroupDetails['student_id'];   
        $createdGroupCourse = [];
        foreach ($teachers as $teacher)
        {
            foreach ($students as $student)
            {
            $course=CourseGroup::create([
                'course_id'=>$courseGroupDetails['course_id'],
                'teacher_id'=>$teacher,
                'student_id'=>$student
            ]);
            $createdGroupCourse[] = $course;
            }   
        }
        return $createdGroupCourse;
    }

    public function updateCourseGroup(array $courseGroupDetails,$courseGroupId)
    {

    }
}