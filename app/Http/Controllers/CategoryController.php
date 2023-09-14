<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',   
        ]);

        $category = new Category;
        $category->id=$request->category;
        $category->name=$request->name;
        $category->slug=$request->slug;
        

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(public_path('category'),$filename);
            $category->image=$filename;
        }

            $category->save();
            
            return redirect()->back()->with('message','Category Successfully Created');

    }

    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }
        else{
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {   
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',   
        ]);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(public_path('category'),$filename);
            $category->image=$filename;
        }
        
        $update=$category->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'image' => $filename ?? $category->image,
        ]);

        if($update)
        {
            return redirect('/categories')->with('message','Category Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $delete=$category->delete();
        if($delete)
        {
            return redirect()->back()->with('message','Category Deleted Successfully');
        }

    }
}
