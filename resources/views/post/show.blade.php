@extends('layouts.app')

@section('content')
    <style>
        .green{
            color: darkgreen;
        }
        .red{
            color: red;
        }
    </style>
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
                        <div class="form-group">
                            <div class="form-control">Title : {{$post->title}}</div>
                        </div>
                        <div class="form-group">
                            <div class="form-control">Author : {{$post->user->name}}</div>
                        </div>
                        <div class="form-group">
                            <div class="form-control">
                                Tags :
                                @foreach($post->tag as $key => $tags)
                                    <span class="{{$tags->status == 'active' ? 'green' : 'red'}}">#{{$tags->display_name}}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="">Image : <img src="{{asset('uploads/images/'.$post->image->name)}}" class="img-responsive" /></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group form-control">
                            Description : {{$post->description}}
                            <div class="clearfix"></div>
                        </div>
                        <a href="{{route('post.index')}}"><button class="btn btn-primary">Back</button></a>
                        <a href="{{route('post.edit',$post->id)}}"> <button  class="btn btn-default" >Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection