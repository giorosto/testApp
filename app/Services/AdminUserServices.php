<?php

namespace App\Services;

use App\Interfaces\AdminUserServicesInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserServices implements AdminUserServicesInterface
{

    public function getAll()
    {
        return User::get();
    }
    public function update($id, Request $request)
    {
        $userToUpdate = User::find($id);
        foreach($userToUpdate->getRoleNames() as $role){
            $userToUpdate->removeRole($role);
        }
        $userToUpdate->assignRole($request->role);
    }

    public function getAllRoles()
    {
        return Role::get();
    }
}
