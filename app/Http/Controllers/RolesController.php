<?php

namespace App\Http\Controllers;

use App\Models\UserRoles;
use App\Http\Requests\StoreUserRolesRequest;
use App\Http\Requests\UpdateUserRolesRequest;
use App\Interfaces\UserRoleRepositoryInterface;

class RolesController extends Controller
{
    private UserRoleRepositoryInterface $userRoleRepository;

    public function __construct(UserRoleRepositoryInterface $userRoleRepository)
    {
        $this->userRoleRepository=$userRoleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=$this->userRoleRepository->getAllRoles();
        return view('roles/index',compact('roles'));
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
     * @param  \App\Http\Requests\StoreUserRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRolesRequest $request)
    {
        $roleDetails=['name'=>$request->name];
        $this->userRoleRepository->storeRole($roleDetails);
        return back()->with(['msg'=>'Role successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function show(UserRoles $userRoles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRoles $userRoles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRolesRequest  $request
     * @param  \App\Models\UserRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRolesRequest $request, $id)
    {
        $roleDetails=['name'=>$request->name];
        $this->userRoleRepository->updateRole($roleDetails,$id);
        return back()->with(['msg'=>'Role successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRoleRepository->deleteRole($id);
        return back()->with(['msg'=>'Role successfully deleted!']);
    }
}
