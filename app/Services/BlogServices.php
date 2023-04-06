<?php

namespace App\Services;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Interfaces\BlogServicesInterface;
use  \App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class BlogServices implements BlogServicesInterface
{
    function getAll()
    {
        return Blog::all();
    }
    function paginated($quantity = 10)
    {
        return Blog::with(['author'])->orderBy('created_at','DESC')->paginate($quantity);
    }
    function getById($id)
    {
        return Blog::find($id);
    }
    function create(BlogRequest $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        return Blog::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'image' => asset('/images'). '/'. $name,
            'category_id' => $request['category_id'],
            'user_id' => auth()->user()->id,
        ]);
    }
    function byCategoryId($category_id)
    {
        return Blog::where('category_id', $category_id)->get();
    }
    function update($id, BlogUpdateRequest $request)
    {
        if (!Auth::user()->hasRole('admin') && !Blog::find(id)->user_id == Auth::user()->id) {
            return abort(403);
        }
        $image = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $this->getById($id)->image;
        }
        Blog::where('id', $id)->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category_id'],
            'image' =>  $name,
        ]);
        return redirect()->route('admin.index');
    }
    function delete($id){
        if (!Auth::user()->hasRole('admin') && !Blog::find($id)->user_id == Auth::user()->id) {
            return abort(403);
        }
        Blog::where('id',$id)->first()->delete();
        return redirect()->route('admin.index');
    }

    function getCategories(){
        return Category::get();
    }

}
