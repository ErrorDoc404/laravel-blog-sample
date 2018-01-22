<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(3 );
        return view('image/list',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute is already uploaded.',
        ];
        $this->validate($request,[
            'name' => 'required|unique:images',
        ],$message);
        if(Input::hasFile('name')){
            $file = Input::file('name');
            $file->move('uploads/images', $file->getClientOriginalName());
            $image = new Image();
            $image->name = $file->getClientOriginalName();
            $image->save();
        }
        return Redirect::route('image.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imageShow = Image::findorfail($id);
        return view('image/show',compact('imageShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findorfail($id);
        $image->delete();
        $pathOfImage = public_path().'/uploads/images/'.$image->name;
//        dd($pathOfImage );
        File::delete($pathOfImage);
        return Redirect::route('image.index');
    }
}
