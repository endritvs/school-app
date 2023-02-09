<?php 

namespace App\Repositories;
use App\Interfaces\CourseGroupRepositoryInterface;
use App\Models\CourseGroup;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

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

    public function getCourseGroupsByTeacherId()
    {
        $teacher_id = Auth::user()->id;
        $courseGroups = CourseGroup::whereHas('teachers', function ($query) use ($teacher_id) {
            $query->where('id', $teacher_id);
        })->with('teachers','students','course')->get()->groupBy('course_id');
        $courseGroups = CourseGroup::where('teacher_id', $teacher_id)->with('teachers','students','course')->get()->groupBy('course_id');
        return $courseGroups;
    }

    public function getCourseGroupsByStudentId()
    {
        $student_id = Auth::user()->id;
        $courseGroups = CourseGroup::whereHas('students', function ($query) use ($student_id) {
            $query->where('id', $student_id);
        })->with('teachers','students','course')->get()->groupBy('course_id');
        $courseGroups = CourseGroup::where('student_id', $student_id)->with('teachers','students','course')->get()->groupBy('course_id');
        return $courseGroups;
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