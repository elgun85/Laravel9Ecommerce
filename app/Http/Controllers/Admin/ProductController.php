<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('id','DESC')->paginate(7);
        return view('backend.product.product_index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        $brands=Brand::get();
        $colors=Color::all();
        return view('backend.product.product_create',compact('categories','brands','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
    $validateData=$request->validated();
            $category=Category::findOrFail($validateData['category_id']);
            if ($category)
            {
                $request->merge([
                    'slug' => Str::slug($request->name)
                ]);
                $request->merge([
                    'trending' => $request->trending== true ? '1':'0',
                ]);
                $request->merge([
                    'status' => $request->status== true ? '1':'0',
                ]);

                $product=$category->product()->create($request->post());


                if ($request->hasFile('image'))
                {
                    $uploadPath='uploads/product/';
                    $i=1;
                    foreach ($request->file('image') as $imageFile){
                        $extention = $imageFile->getClientOriginalExtension();
                        $filename=time().$i++.'.'.$extention;
                        $imageFile->move($uploadPath,$filename);
                        $finalImagePathName=$uploadPath.$filename;

                        $product->productImages()->create([
                            'product->id' =>$product->id,
                            'image'       =>$finalImagePathName,
                        ]);
                    }
                }
            }else{
                return redirect()->route('product.index')->with('error','Product no added Successfully');
            }

            if ($request->colors)
        {
            foreach ($request->colors as $key=>$color)
            {
                $product->productColors()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'Color_quantity'=>$request->Color_quantity[$key] ?? 0
                ]);
            }
        }


        return redirect()->route('product.index')->with('message','Product added Successfully');


    }

    public function show($id)
    {
        return 'show';
    }

/*                                    edit     startr              */
    public function edit($id)
    {
        $categories=Category::get();
        $brands=Brand::get();
        $products=Product::findOrFail($id);
        $product_color=$products->productColors()->pluck('color_id')->toArray();
        $colors=Color::whereNotIn('id',$product_color)->get();
        return view('backend.product.product_edit',compact('products','categories','brands','product_color','colors'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        $validateData=$request->validated();

        $product=Category::findOrFail($validateData['category_id'])
        ->product()->where('id',$id)->first();
        if ($product)
        {
            $request->merge([
                'slug' => Str::slug($request->name)
            ]);
            $request->merge([
                'trending' => $request->trending== true ? '1':'0',
            ]);
            $request->merge([
                'status' => $request->status== true ? '1':'0',
            ]);
            $product->update($request->post());


            if ($request->hasFile('image'))
            {
                $uploadPath='uploads/product/';
                $i=1;
                foreach ($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename=time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName=$uploadPath.$filename;

                    $product->productImages()->create([
                        'product->id' =>$product->id,
                        'image'       =>$finalImagePathName,
                    ]);
                }
            }
        }else{
            return redirect()->route('product.index')->with('error','No such Product Id Found');
        }

        if ($request->colors)
        {
         // dd($request->Color_quantity);
            foreach ($request->colors as $key=>$color)
            {
                $product->productColors()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'Color_quantity'=>$request->Color_quantity[$key] ?? 0
                ]);
            }
            return  redirect()->back();
        }

      return redirect()->route('product.index')->with('message','Data added Successfully');
    }

    /*                                    edit     finish              */

    public function updateProdColorQty(Request $request,$pro_color_id){

            $proColorData=ProductColor::findOrFail($pro_color_id)->where('id',$pro_color_id)->first();
        $proColorData->update([
                'Color_quantity'=>$request->Color_quantity
            ]);
        return redirect()->back();
    }

    public function deleteProdColorQty($pro_color_id){
        $delColData=ProductColor::findOrFail($pro_color_id)->where('id',$pro_color_id)->first();
        $delColData->delete();
        return redirect()->back();
    }

    public function destroy($id)
    {
        return 'destroy';
    }

    public function delete($id)
    {
        $product=Product::findOrFail($id);
        if ($product->productImages){
            foreach ($product->productImages as $image){
                if (File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();

        return redirect()->back()->with('message','Product Deleted with all its image');
    }



    public function ProductImageDel($id)
    {
        $ProductImageDel=ProductImage::findOrFail($id);
        if (File::exists($ProductImageDel->image)) {

            File::delete($ProductImageDel->image);
        }
        $ProductImageDel->delete();
        return redirect()->back()->with('message','Product image deleted Successfully');
    }


/*    public function updateProdColorQty(Request $request,$id)
    {
$productColorData=Product::findOrFail($request->product_id)
    ->productColors()
    ->where('id',$id)
->first();
$productColorData->update([
   'quantity'=>$request->qty
]);
return response()->json(['message'=>'Product Color Qty updated']);
    }*/

}
