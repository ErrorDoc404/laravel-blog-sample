@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('user.update'))
            <div class="alert alert-success">
                {{ session('user.update') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        Title : {{$post->title}}<br>
                        Author : {{$post->user->name}}<br>
                        Description : {{$post->description}}<br>
                        Image: <img src="{{URL::to('/')}}/uploads/images/{{$post->image->name}}" class="img-responsive"/> <br>
                        <a href="{{route('post.index')}}"><button class="btn btn-primary">Back</button></a>
                        <a href="{{route('post.edit',$post->id)}}"> <button  class="btn btn-default" >Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection