@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        Title : {{$selectedPost->title}}<br>
                        Author : {{$selectedPost->author}}<br>
                        Description : {{$selectedPost->description}}<br>
                        Image: <img src="{{URL::to('/')}}/uploads/images/{{$selectedImage->name}}" class="img-responsive"/> <br>
                        <a href="{{route('post.index')}}"><button class="btn btn-primary">Back</button></a>
                        <a href="{{route('post.edit',$selectedPost->id)}}"> <button  class="btn btn-default" >Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection