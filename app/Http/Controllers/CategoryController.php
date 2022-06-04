<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'title' => 'required|string|min:4',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'title.min' => 'Enter Atleast 4 Character'
        ]);
        $category = new category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        return back()->with('toast_success','Category added');
//        return redirect()->route('category.index')->with('toast_success','Category added');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|min:4',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],[
        'title.min' => 'Enter Atleast 4 Character'
    ]);
        $category = Category::find($request->category_id);
        if(empty($category)){
            return back()->with('toast_error','Category not found');
        }
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $category->image = $imageName;
        }
        $category->save();
        return redirect()->route('category.index')->with('toast_success','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('toast_success','Category deleted');
    }
}
