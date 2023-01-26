<?php 

namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::with('role')->latest()->paginate(10);
    }

    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    public function deleteUser($userId)
    {
        $user=User::findOrFail($userId);
        return $user->delete($userId);
    }

    public function storeUser(array $userDetails)
    {
        return User::create($userDetails);
    }

    public function updateUser(array $userDetails,$userId)
    {
        $user=User::findOrFail($userId);
        return $user->update($userDetails);
    }

    public function getUsersByRole($roleId)
    {
        return User::with('role')->where('role_id',$roleId)->get();
    }
}