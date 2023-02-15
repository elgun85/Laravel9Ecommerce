<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.category_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $fileName=str::limit(Str::slug($request->name),10).'_'.rand(99991,9999999).'.'.$request->image->extension();
            $fileUpload='uploads/category/'.$fileName;
            $request->image->move(public_path('uploads/category'),$fileName);
            $request->merge([
                'image'=>$fileUpload
            ]);
        }

        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->merge([
            'status' => $request->status==true?'1':'0'
        ]);

        Category::create($request->post());

        return redirect()->route('category.index')->with('message','Data added Successfully');

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
    public function edit(Category $category)
    {
     //   $categories = Category::find($id) ?? abort(404, 'bele sehife yoxdur');

        return view('backend.category.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {


        if ($request->hasFile('image'))
        {
          $path = Category::find($id)->image    ;

            if (File::exists($path))
            {
                File::delete($path);
            }
            //File::delete(public_path($silinecek));

            $fileName=str::limit(Str::slug($request->name),10).'_'.rand(99991,9999999).'.'.$request->image->extension();
            $fileUpload='uploads/category/'.$fileName;
            $request->image->move(public_path('uploads/category'),$fileName);
            $request->merge([
                'image'=>$fileUpload
            ]);
        }

        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->merge([
            'status' => $request->status==true?'1':'0'
        ]);

        $category=Category::findOrFail($id)->update($request->post());

        return redirect()->route('category.index')->with('message','Data updated Successfully');
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
        $data=Category::findOrFail($id);
        if (File::exists($data->image)) {

            File::delete(public_path($data->image));
        }

        $data->delete();
        return redirect()->route('category.index')->with('message','Data deleted Successfully');
    }
}
