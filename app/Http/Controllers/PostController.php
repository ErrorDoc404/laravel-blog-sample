<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\User;
use App\Tag;
use App\PostTag;
use App;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(3 );
        return view('post/list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $tags = Tag::all();
        return view('post/create',compact('users','tags'));
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
            'unique' => 'The :attribute field Must be Unique.',
            'max' => 'The :attribute field is :max length',
            'exists' => 'The :attribute is not available as :exists',
            'name.required' => 'Select Image to Upload',
        ];
        $this->validate($request, [
            'title' => 'required|min:2|max:15|unique:posts',
            'description' => 'required|max:191',
            'author' => 'required|exists:users,id',
            'name' => 'required|max:5120',
            'tags' => 'required',
        ], $message);
        $imageValue = null;
        if (Input::hasFile('name')) {
            $image = new Image();
            $file = Input::file('name');
            $file->move('uploads/images', $file->getClientOriginalName());
            $image->name = $file->getClientOriginalName();
            $image->save();
            $imageValue = $image->id;
//            dd($imageValue);
        }
        $post = new Post();
        $post->image_id = $imageValue == null ? 0 : $imageValue;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->author;
        $post->save();
        $count = count($request->tags);
        $tag_id [] = null;
        for($i=0;$i<$count;$i++){
            if((int)$request->tags[$i] == null){
                $tag = new Tag();
                $tag->name = strtolower($request->tags[$i]);
                $tag->status = 'inactive';
                $tag->display_name = $request->tags[$i];
                $tag->save();
                $tag_id[$i] = $tag->id;
            }elseif((int)$request->tags[$i] != null){
                $tag_id[$i] = $request->tags[$i];
            }
        }
        $post->tag()->attach($tag_id);
        return Redirect::route('post.index')->with('post.store','New post created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorfail($id);
        return view('post/show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        $tags = Tag::all();
        $post_tags = $post->tag->toArray();
        return view('post/edit',compact('post','users','tags','post_tags'));
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
        $message = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute field Must be Unique.',
            'max' => 'The :attribute field size must be :size',
        ];
        $this->validate($request,[
            'title' => 'required|min:2|max:15',
            'description' => 'required|max:191',
            'tags' => 'required',
        ],$message);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->author;
        $post->save();
        $count = count($request->tags);
        $tag_id [] = null;
        for($i=0;$i<$count;$i++){
            if((int)$request->tags[$i] == null){
                $tag = new Tag();
                $tag->name = strtolower($request->tags[$i]);
                $tag->status = 'inactive';
                $tag->display_name = $request->tags[$i];
                $tag->save();
                $tag_id[$i] = $tag->id;
            }elseif((int)$request->tags[$i] != null){
                $tag_id[$i] = $request->tags[$i];
            }
        }
        $post->tag()->sync($tag_id);
        if(Input::hasFile('name')){
            $image = Image::find($post->image_id);
            $pathOfImage = public_path().'/uploads/images/'.$image->name;
            File::delete($pathOfImage);
            $file = Input::file('name');
            $file->move('uploads/images', $file->getClientOriginalName());
            $image->name = $file->getClientOriginalName();
            $image->save();
        }
        return Redirect::route('post.show',$id)->with('post.update','post update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $imageId = $post->image_id;
        $post->delete();
        $image = Image::find($imageId);
        $image->delete();
        $pathOfImage = public_path().'/uploads/images/'.$image->name;
        File::delete($pathOfImage);
        return Redirect::route('post.index')->with('post.destroy','Selected post delete Successfully');
    }

    /**
     * @param $id
     * create eidit view
     */

}
