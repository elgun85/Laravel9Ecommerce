<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
$sliders=Slider::where('status',0)->get();
        return view('frontend.index',compact('sliders'));
    }

    public function category()
    {
        $categories=Category::where('status',0)->get();
        return view('frontend.category.category_index',compact('categories'));
    }

    /*                          product       start                  */

    public function product($category_slug)
    {
 $category=Category::where('slug',$category_slug)->first();
if ($category)
{

return view('frontend.category.product_index',compact('category'));
}else{
    return redirect()->back();
}
    }

/*                          productView       start                  */

    public function productView(string $category_slug,string $product_slug)
    {
        $category=Category::where('slug',$category_slug)->first();
        if ($category)
        {
            $product = $category->product()->where('slug', $product_slug)->where('status', 0)->first();
            if ($product)
            {
                return view('frontend.category.product_view', compact('category','product'));
            }
            else
            {
                return redirect()->back();
            }
        }
    }





}
