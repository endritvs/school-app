<?php 

namespace App\Interfaces;

interface UserRepositoryInterface
{

    public function getAllUsers();
    public function getUserById($userId);
    public function deleteUser($userId);
    public function storeUser(array $userDetails);
    public function updateUser(array $userDetails,$userId);
    public function getUsersByRole($roleId);
}