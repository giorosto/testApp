<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogServicesInterface;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
        * The BlogServicesInterface instance.
        * @var BlogServicesInterface
     */
    public BlogServicesInterface $blogServices;
    /**
        * Create a new controller instance.
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
     *
     * @return View
     */
    public function index()
    {
        $blogs = $this->blogServices->paginated(10);
        return view('guest.index', compact('blogs'));
    }
    /**
     * Display the specified resource.
     * @param  string $slug
     * @param  int $id
     * @return View
    */
    public function show($slug,$id){
        $blog = $this->blogServices->getById($id);
        return view('guest.show', compact('blog'));
    }
    /**
     * Display the specified resource.
     * @param  string $slug
     * @param  int $category_id
     * @return View
    */
    public function category($slug,$category_id){
        $blogs = $this->blogServices->byCategoryId($category_id);
        return view('guest.index', compact('blogs'));
    }
}
