<?php

namespace App\Http\Controllers;

use App\User;
use App\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5 );
        return view('user/list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->contact = $request->contact;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/images/profile', $file->getClientOriginalName());
            $user->image_id = $file->getClientOriginalName();
        }
        $user->save();
        return Redirect::route('user.index')->with('user.store','New User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectedUser = User::findorfail($id);
        return view('user/show',compact('selectedUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = User::findorfail($id);
        return view('user/edit',compact('editUser'));
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
//        dd($request,$id);
        $message = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute field Must be Unique.',
            'max' => 'The :attribute field size must be :size',
        ];
        $this->validate($request,[
            'name' => 'required|min:3|max:15',
            'contact' => 'required|max:10',
            'gender' => 'required|',
            'dob' => 'required|date',
        ],$message);
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->gender =$request->gender;
        $user->dob =$request->dob;
        if(Input::hasFile('image')){
            $file = Input::file('image');
            $file->move('uploads/images/profile', $file->getClientOriginalName());
            $pathOfImage = public_path().'/uploads/images/public'.$user->image_id;
            File::delete($pathOfImage);
            $user->image_id = $file->getClientOriginalName();
        }
        $user->save();
        return Redirect::route('user.show',$id)->with('user.update','Record is now Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::findorfail($id);
       $user->delete();
       return Redirect::route('user.index')->with('user.destroy','The Selected record is deleted');
    }
}
