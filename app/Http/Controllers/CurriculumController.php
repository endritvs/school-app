<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Interfaces\CurriculumRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;

class CurriculumController extends Controller
{
    private CurriculumRepositoryInterface $curriculumRepository;
    private CourseRepositoryInterface $courseRepository;
    public function __construct(CurriculumRepositoryInterface $curriculumRepository,CourseRepositoryInterface $courseRepository)
    {
        $this->curriculumRepository=$curriculumRepository;
        $this->courseRepository=$courseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = $this->curriculumRepository->getAllCurriculums();
        $courses = $this->courseRepository->getAllCourses();
        return view('curriculum/index')->with(['curriculums'=>$curriculums,'courses'=>$courses]);
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
     * @param  \App\Http\Requests\StoreCurriculumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurriculumRequest $request)
    {
        $curriculumDetails =
        [
         'name'=>$request->name,
         'grade'=>$request->grade,
         'course_id'=>$request->course_id
        ];
        $this->curriculumRepository->storeCurriculum($curriculumDetails);
        return back()->with(['msg'=>'Curriculum successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function show($curriculumId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit($curriculumId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurriculumRequest  $request
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurriculumRequest $request,$curriculumId)
    {
        $curriculumDetails =
        [
         'name'=>$request->name,
         'grade'=>$request->grade,
         'course_id'=>$request->course_id
        ];
        $this->curriculumRepository->updateCurriculum($curriculumDetails,$curriculumId);
        return back()->with(['msg'=>'Curriculum successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy($curriculumId)
    {
        $this->curriculumRepository->deleteCurriculum($curriculumId);
        return back()->with(['msg'=>'Curriculum successfully deleted!']);
    }
}
