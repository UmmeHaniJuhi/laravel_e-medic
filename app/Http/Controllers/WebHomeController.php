<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class WebHomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->latest()->limit(12)->get();

        return view('frontend.home', compact('categories','subcategories','brands','products'));
    }
    public function view_details($id)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $product=Product::findOrFail($id);

        $cat_id=$product->cat_id;
        $related_products=Product::where('cat_id',$cat_id)->limit(4)->get();
        return view('frontend.pages.view_details', compact('categories','subcategories','brands','product','related_products'));
    }
    public function product_by_cat($id)
    {
        $categories=Category::all();
        $subcategories=SubCategory::where('cat_id', $id)->get();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
        $selectedCat = Category::find($id);
        return view('frontend.pages.product_by_cat', compact('categories','subcategories','brands','products','selectedCat'));

    }
    public function product_by_subcat($id)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
        $selectedSubCat = SubCategory::find($id);
        return view('frontend.pages.product_by_subcat', compact('categories','subcategories','brands','products','selectedSubCat'));

    }
    public function product_by_brand($id)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('br_id',$id)->limit(12)->get();
        $selectedBrand = Brand::find($id);
        return view('frontend.pages.product_by_brand', compact('categories','subcategories','brands','products', 'selectedBrand'));

    }

}


