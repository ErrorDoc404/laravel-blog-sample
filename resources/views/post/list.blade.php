@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                    @foreach($posts as $key => $post)
                                        <tr>
                                            <td>{{ $post->id  }}</td>
                                            <td>{{ $post->title  }}</td>
                                            <td>{{ $post->author  }}</td>
                                            <td><a href="{{route('post.show',['id'=>$post->id])}}"><button type="submit"  class="btn btn-success form-control" value="{{ $post->id  }}">View</button></a> </td>
                                            <td><form method="post" action="{{route('post.destroy',['id'=>$post->id])}}">{{csrf_field()}} <input type="hidden" name="_method" value="DELETE"/> <button type="submit" class="btn btn-danger form-control" value="{{ $post->id  }}">Delete</button></form></td>
                                        </tr>
                                    @endforeach
                                </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection