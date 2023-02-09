<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserRoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;

    public function __construct(UserRepositoryInterface $userRepository,UserRoleRepositoryInterface $userRoleRepository)
    {
        $this->userRepository=$userRepository;
        $this->userRoleRepository=$userRoleRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=$this->userRepository->getAllUsers();
        $roles=$this->userRoleRepository->getAllRoles();
        return view('dashboard',compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $userDetails=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_confirmation'=>$request->password_confirmation,
            'role_id'=>$request->role_id,
        ];
        $this->userRepository->storeUser($userDetails);
        return back()->with(['msg'=>'User successfully created!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $userDetails=[
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role_id
        ];
        $this->userRepository->updateUser($userDetails,$id);
        return back()->with(['msg'=>'User successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return back()->with(['msg'=>'User successfully deleted!']);
    }
}
