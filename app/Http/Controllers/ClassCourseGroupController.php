<?php

namespace App\Http\Controllers;

use App\Models\Class_Course_Group;
use App\Http\Requests\StoreClass_Course_GroupRequest;
use App\Http\Requests\UpdateClass_Course_GroupRequest;
use App\Interfaces\ClassCourseGroupRepositoryInterface;
use App\Interfaces\ClassRepositoryInterface;
use App\Interfaces\CourseRepositoryInterface;
use App\Models\CourseGroup;
use App\Models\User;
use Carbon\Carbon;

class ClassCourseGroupController extends Controller
{
    private ClassCourseGroupRepositoryInterface $classCourseGroupRepository;
    private ClassRepositoryInterface $classRepository;
    private CourseRepositoryInterface $courseRepository;

    public function __construct(ClassCourseGroupRepositoryInterface $classCourseGroupRepository,ClassRepositoryInterface $classRepository,CourseRepositoryInterface $courseRepository)
    {
        $this->classCourseGroupRepository=$classCourseGroupRepository;
        $this->classRepository=$classRepository;
        $this->courseRepository=$courseRepository;
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $classCourseGroups=$this->classCourseGroupRepository->getAllClassCourseGroups();
        $classes=$this->classRepository->getAllClasses();
        $courses=$this->courseRepository->getAllCourses();

        $data = [];
        foreach ($classCourseGroups as $classCourseGroup) {
            $teacherIds = CourseGroup::where('course_id', $classCourseGroup->courses->id)
                ->pluck('teacher_id')
                ->toArray();
            $teachers = User::whereIn('id', $teacherIds)->where('role_id', 2)->get();
    
            $studentIds = CourseGroup::where('course_id', $classCourseGroup->courses->id)
                ->pluck('student_id')
                ->toArray();
            $studentCount = User::whereIn('id', $studentIds)->where('role_id', 3)->count();
    
            $data[] = [
                'id' => $classCourseGroup->id,
                'course_name' => $classCourseGroup->courses->name,
                'class_name' => $classCourseGroup->classes->class_name,
                'teacher_names' => $teachers->pluck('name')->implode(', '),
                'student_count' => $studentCount,
                'date_start' => Carbon::parse($classCourseGroup->date_start)->format('l, jS F Y h:i:s A'),
                'date_end' => Carbon::parse($classCourseGroup->date_end)->format('l, jS F Y h:i:s A'),
            ];
        }
        $data=$this->paginate($data,10);
        $data->withPath('/dashboard/class-course-groups');
        return view('classCourseGroups/index',compact('data','classes','courses'));
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
     * @param  \App\Http\Requests\StoreClass_Course_GroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClass_Course_GroupRequest $request)
    {
        $classCourseGroupsDetails=[
            'class_id'=>$request->class_id,
            'course_id'=>$request->course_id,
            'date_start'=>$request->date_start,
            'date_end'=>$request->date_end
        ];
        $this->classCourseGroupRepository->storeClassCourseGroup($classCourseGroupsDetails);
        return back()->with(['msg'=>'Class Course Group successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Class_Course_Group  $class_Course_Group
     * @return \Illuminate\Http\Response
     */
    public function show(Class_Course_Group $class_Course_Group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Class_Course_Group  $class_Course_Group
     * @return \Illuminate\Http\Response
     */
    public function edit(Class_Course_Group $class_Course_Group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClass_Course_GroupRequest  $request
     * @param  \App\Models\Class_Course_Group  $class_Course_Group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClass_Course_GroupRequest $request,$id)
    {
        $classCourseGroupsDetails=[
            'class_id'=>$request->class_id,
            'course_id'=>$request->course_id,
            'date_start'=>$request->date_start,
            'date_end'=>$request->date_end
        ];
        $this->classCourseGroupRepository->updateClassCourseGroups($classCourseGroupsDetails,$id);
        return back()->with(['msg'=>'Class Course Group successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Class_Course_Group  $class_Course_Group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->classCourseGroupRepository->deleteClassCourseGroup($id);
        return back()->with(['msg'=>'Class Course Group successfully deleted!']);
    }
}
