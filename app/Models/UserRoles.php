<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRoles extends Model
{
    use HasFactory;

    protected $table="user_roles";
    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
