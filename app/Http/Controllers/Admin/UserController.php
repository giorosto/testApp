<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminUserServicesInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * The AdminUserServicesInterface instance.
     * @var AdminUserServicesInterface
     */
    private AdminUserServicesInterface $adminUserServices;
    /**
     * UserController constructor.
     * @param AdminUserServicesInterface $adminUserServices
     */
    public function __construct( AdminUserServicesInterface $adminUserServices)
    {
        $this->adminUserServices = $adminUserServices;
    }
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(){
        $users = $this->adminUserServices->getAll();
        $roles = $this->adminUserServices->getAllRoles();
        return view('admin.users.index', ['users'=>$users, 'roles'=>$roles]);
    }

    /*
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return View
     * */
    public function update(Request $request){
        $this->adminUserServices->update($request->id, $request);
        return redirect()->route('admin.users.index');
    }
}
