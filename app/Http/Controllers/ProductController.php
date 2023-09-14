<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();

        return view('admin.product.create', compact('categories','subcategories','brands'));
        
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required|unique:products',  
            'price' => 'required|numeric|min:0',  
        ]);

        $product = new Product;
        $product->id = $request->product;
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->br_id = $request->brand;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->description = $request->description;
        

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(public_path('product'),$filename);
            $product->image=$filename;
        }

            $product->save();
            
            return redirect()->back()->with('message','Product Successfully Added');

    }

    /**
     * Display the specified resource.
     */
    public function change_status(Product $product)
    {
        if($product->status==1){
            $product->update(['status'=>0]);
        }
        else{
            $product->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        return view('admin.product.edit', compact('categories','subcategories','brands','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'code' => 'required|unique:products,code,' . $product->id,
        'name' => 'required|unique:products,name,' . $product->id,
        'price' => 'required|numeric|min:0',
       'category' => 'required|exists:categories,id',
        'subcategory' => 'required|exists:sub_categories,id',
        'brand' => 'required|exists:brands,id',
    ]);

    $filename = $product->image;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('product'), $filename);
    }

    $update = $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'code' => $request->code,
        'cat_id' =>$request->category,
        'subcat_id' => $request->subcategory,
        'br_id' => $request->brand,
        'image' => $filename,
        'description' => $request->description,
    ]);

    if ($update) {
        return redirect('/products')->with('message', 'Product Updated Successfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete=$product->delete();
        if($delete)
        {
            return redirect()->back()->with('message','Product Deleted Successfully');
        }
    }
}
