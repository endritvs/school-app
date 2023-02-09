<?php

namespace App\Http\Controllers;

use App\Models\CourseGroup;
use App\Http\Requests\StoreCourseGroupRequest;
use App\Http\Requests\UpdateCourseGroupRequest;
use App\Interfaces\CourseGroupRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;

class CourseGroupController extends Controller
{   
    private CourseGroupRepositoryInterface $courseGroupRepository;
    // private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseGroupRepositoryInterface $courseGroupRepository)
    {       
        $this->courseGroupRepository=$courseGroupRepository;
        // $this->courseRepository=$courseRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursesGroups=$this->courseGroupRepository->getAllCourseGroups();
        return view('coursesGroups/index',compact('coursesGroups'));
    }

    public function getCourseGroupForTeacher()
    {
        $coursesGroups=$this->courseGroupRepository->getCourseGroupsByTeacherId();
        $coursesGroups=$this->paginate($coursesGroups,10);
        $coursesGroups->withPath('/teacher');
        return view('teacher/index',compact('coursesGroups'));
    }
    
    public function getCourseGroupForStudent()
    {
        $coursesGroups=$this->courseGroupRepository->getCourseGroupsByStudentId();
        $coursesGroups=$this->paginate($coursesGroups,10);
        $coursesGroups->withPath('/student');
        return view('student/index',compact('coursesGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseGroupRequest $request)
    {
        $courseGroupDetails=[
            'course_id'=>$request->course_id,
            'teacher_id'=>$request->teacher_id,
            'student_id'=>$request->student_id,
        ];
        $this->courseGroupRepository->storeCourseGroup($courseGroupDetails);
        return back()->with(['msg'=>'Course Group created successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseGroup  $courseGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->courseGroupRepository->deleteCourseGroup($id);
        return back()->with(['msg'=>'Group successfully deleted!']);
    }
}
