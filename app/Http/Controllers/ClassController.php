<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Interfaces\ClassRepositoryInterface;

class ClassController extends Controller
{
    private ClassRepositoryInterface $classRepository;
    public function __construct(ClassRepositoryInterface $classRepository)
    {
        $this->classRepository=$classRepository;
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=$this->classRepository->getAllClasses();
        return view('class/index',compact('classes'));
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
     * @param  \App\Http\Requests\StoreClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRequest $request)
    {
        $classDetails=[
            'class_name'=>$request->class_name,
        ];
        $this->classRepository->storeClass($classDetails);
        return back()->with(['msg'=>'Class successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassRequest  $request
     * @param  \App\Models\Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRequest $request,$id)
    {
        $classDetails=[
            'class_name'=>$request->class_name,
        ];
        $this->classRepository->updateClass($classDetails,$id);
        return back()->with(['msg'=>'Class successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->classRepository->deleteClass($id);
        return back()->with(['msg'=>'Class successfully deleted!']);
    }
}
