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
    private UserRepositoryInterface $userRepository;
    // private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseGroupRepositoryInterface $courseGroupRepository,CourseRepositoryInterface $courseRepository,UserRepositoryInterface $userRepository)
    {       
        $this->userRepository=$userRepository;
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
        $students=$this->userRepository->getUsersByRole(3);
        // $groups = $this->courseRepository->getAllCourses();
        return view('coursesGroups/index',compact('coursesGroups','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Models\CourseGroup  $courseGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CourseGroup $courseGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseGroup  $courseGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseGroup $courseGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseGroupRequest  $request
     * @param  \App\Models\CourseGroup  $courseGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseGroupRequest $request,$id)
    {
        //
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
