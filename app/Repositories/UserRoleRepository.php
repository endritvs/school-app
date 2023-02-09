<?php 

namespace App\Repositories;
use App\Interfaces\UserRoleRepositoryInterface;
use App\Models\UserRoles;

class UserRoleRepository implements UserRoleRepositoryInterface
{
    public function getAllRoles()
    {
        return UserRoles::latest()->get();
    }

    public function deleteRole($roleId)
    {
        $role=UserRoles::findOrFail($roleId);
        return $role->delete($roleId);
    }

    public function storeRole(array $roleDetails)
    {
        return UserRoles::create($roleDetails);
    }

    public function updateRole(array $roleDetails,$roleId)
    {
        $role=UserRoles::findOrFail($roleId);
        return $role->update($roleDetails);
    }
}