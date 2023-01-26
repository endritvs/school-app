<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Interfaces\CourseRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class CourseController extends Controller
{
    private CourseRepositoryInterface $courseRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(CourseRepositoryInterface $courseRepository,UserRepositoryInterface $userRepository)
    {
        $this->courseRepository=$courseRepository;
        $this->userRepository=$userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=$this->courseRepository->getAllCourses();
        $teachers=$this->userRepository->getUsersByRole(2);
        $students=$this->userRepository->getUsersByRole(3);
        return view('course/index',compact('courses','teachers','students'));
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
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $courseDetails=['name'=>$request->name];
        $this->courseRepository->storeCourse($courseDetails);
        return back()->with(['msg'=>'Course successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $courseId)
    {
        $courseDetails=['name'=>$request->name];
        $this->courseRepository->updateCourse($courseDetails,$courseId);
        return back()->with(['msg'=>'Course successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId)
    {
        $this->courseRepository->deleteCourse($courseId);
        return back()->with(['msg'=>'Course successfully deleted!']);
    }
}