<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationData;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('backend.brand.brand_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandFormRequest $request)
    {

        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->merge([
            'status' => $request->status==true?'1':'0'
        ]);

        Brand::create($request->post());

        return redirect()->route('brand.index')->with('message','Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::where('status',0)->get();
        $brands=Brand::orderBy('id','DESC')->paginate(5);
        $brands_edit=Brand::find($id) ?? abort(404, 'bele sehife yoxdur');
        return view('backend.brand.brand_edit',compact('brands','brands_edit','categories'));
      //  return view('livewire.admin.brand.brand_edit',compact('brands'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->merge([
            'status' => $request->status==true?'1':'0'
        ]);

        $brands=Brand::findOrFail($id)->update($request->post());;

        return redirect()->route('brand.index')->with('message','Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy';
    }

    public function delete($id)
    {
        $data=Brand::findOrFail($id)->delete();

        return redirect()->route('brand.index')->with('message','Data deleted Successfully');
    }
}
