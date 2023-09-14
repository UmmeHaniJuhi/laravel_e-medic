<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories=SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories',
            'slug' => 'required|unique:sub_categories',  
        ]);

        $subcategory = new SubCategory;
        $subcategory->cat_id=$request->category;
        $subcategory->name=$request->name;
        $subcategory->slug=$request->slug;
    

            $subcategory->save();
            
            return redirect()->back()->with('message','SubCategory Successfully Created');
    }

    public function change_status(SubCategory $subcategory)
    {
        if($subcategory->status==1){
            $subcategory->update(['status'=>0]);
        }
        else{
            $subcategory->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }


    public function edit(SubCategory $subCategory)
    {
        $categories=Category::all();
        return view('admin.subcategory.edit', compact('categories','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,SubCategory $subCategory)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name,' . $subCategory->id,
            'slug' => 'required|unique:sub_categories,slug,' . $subCategory->id,
        ]);
        

        $update=$subCategory->update([
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'slug'=>$request->slug,

            
        ]);

        if($update)
        {
            return redirect('/sub-categories')->with('message','SubCategory Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $delete=$subCategory->delete();
        if($delete)
        {
            return redirect()->back()->with('message','SubCategory Deleted Successfully');
        }

    }
}
