<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Interfaces\BlogServicesInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
        * The BlogServicesInterface instance.
        * @var BlogServicesInterface
     */
    private BlogServicesInterface $blogServices;

    /**
     * BlogController constructor.
     * @param BlogServicesInterface $blogServices
     */
    public function __construct(
        BlogServicesInterface $blogServices
    )
    {
        $this->blogServices = $blogServices;
    }


    /**
     * Display a listing of the resource.
     *  @return View
     */
    public  function index(){
        $categories = $this->blogServices->getCategories();
        return view('admin.index', ['categories'=>$categories]);
    }

    /*
     *  @param BlogRequest $request
     * @return View
     * */
    public function store(BlogRequest $request){
        $this->blogServices->create($request);
        return redirect()->route('admin.index');
    }
    /*
     * @param int $id
     * @return View
     * */
    public function edit(int $id){
        if (!Auth::user()->hasRole('admin') && !$this->blogServices::getById(id)->user_id == Auth::user()->id) {
            return abort(403);
        }
        $blog = $this->blogServices->getById($id);
        $categories = $this->blogServices->getCategories();
        return view('admin.edit', ['blog'=>$blog, 'categories'=>$categories]);
    }
    /*
     * @param BlogUpdateRequest $request
     * @return View
     * */
    public function update(BlogUpdateRequest $request){
        return $this->blogServices->update($request->input('id'), $request);
    }
    /*
     * @return View
     * */
    public function view(){
        $blog = $this->blogServices->getAll();
        return view('admin.view', ['blogs'=>$blog]);
    }
    public function delete(Request $request){
        return $this->blogServices->delete($request->input('id'));
    }
}
