<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::orderBy('id','DESC')->paginate(4);
        return view('backend.slider.slider_index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderFormRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $fileName=str::limit(Str::slug($request->name),10).'_'.rand(99991,9999999).'.'.$request->image->extension();
            $fileUpload='uploads/slider/'.$fileName;
            $request->image->move(public_path('uploads/slider'),$fileName);
            $request->merge([
                'image'=>$fileUpload
            ]);
        }
        $request->merge([
            'status' => $request->status==true?'1':'0'
        ]);
        Slider::create($request->post());

        return redirect()->route('slider.index')->with('message','Data added Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $sliders=Slider::orderBy('id','DESC')->paginate(4);
        return view('backend.slider.slider_edit',compact('slider','sliders'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderFormRequest $request, $id)
    {
            if ($request->hasFile('image'))
        {
            $path=Slider::find($id)->image;
            if (File::exists($path))
            {
                File::delete($path);
            }

            $fileName=str::limit(Str::slug($request->name),10).'_'.rand(99991,9999999).'.'.$request->image->extension();
            $fileUpload='uploads/slider/'.$fileName;
            $request->image->move(public_path('uploads/slider'),$fileName);
            $request->merge([
                'image'=>$fileUpload
            ]);
        }
        $request->merge([
            'status' => $request->status==true?'1':'0'
        ]);
        $Data=Slider::findOrFail($id)->update($request->post());

        return redirect()->route('slider.index')->with('message','Data updated Successfully');
    }
    public function delete($id)
    {
        $data=Slider::findOrFail($id);
        if (File::exists($data->image))
        {
            File::delete(public_path($data->image));
        }

        $data->delete();
        return redirect()->route('slider.index')->with('message','Data deleted Successfully');
    }



    public function destroy($id)
    {
        //
    }
}
