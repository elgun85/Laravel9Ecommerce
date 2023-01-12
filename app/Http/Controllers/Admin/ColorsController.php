<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsFormRequest;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors=Color::orderBy('id','DESC')->paginate(4);
        return view('backend.colors.colors_index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorsFormRequest $request)
    {

        if ($request->post()){
            $request->merge([
                'status' => $request->status== true ? '1':'0',
            ]);
            $product=Color::create($request->post());
        }else{
            return redirect()->back()->with('error',"No Added Color Successfully");
        }

        return redirect()->route('colors.index')->with('message',"Added Color Successfully");

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
    public function edit($id)
    {
        $colors=Color::findOrFail($id);
        $coloreFull=Color::orderBy('id','DESC')->paginate(4);
        return view('backend.colors.colors_update',compact('colors','coloreFull'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorsFormRequest $request, $id)
    {
        $colors=Color::findOrFail($id);
        if ($colors){
            $request->merge([
                'status' => $request->status== true ? '1':'0',
            ]);
            $update=$colors->update($request->post());
        }else{
            return redirect()->back()->with('error',"No Updated Color Successfully");
        }

        return redirect()->route('colors.index')->with('message'," Color Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        $data=Color::findOrFail($id)->delete();

        return redirect()->route('colors.index')->with('message','Colors deleted Successfully');
    }
}
