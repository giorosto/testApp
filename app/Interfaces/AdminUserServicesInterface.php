<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AdminUserServicesInterface
{
    public function getAll();
    public function update($id, Request $request);
    public function  getAllRoles();
}
