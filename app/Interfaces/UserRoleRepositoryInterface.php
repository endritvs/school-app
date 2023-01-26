<?php 

namespace App\Interfaces;

interface UserRoleRepositoryInterface
{

    public function getAllRoles();
    public function deleteRole($roleId);
    public function storeRole(array $roleDetails);
    public function updateRole(array $roleDetails,$roleId);

}