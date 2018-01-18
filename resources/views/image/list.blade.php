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
                                <th>Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                            @foreach($images as $key => $image)
                                <tr>
                                    <td>{{ $image->id  }}</td>
                                    <td>{{ $image->name  }}</td>
                                    <td><a href="{{route('image.show',['id'=>$image->id])}}"><button type="submit"  class="btn btn-success form-control" value="{{ $image->id  }}">View</button></a> </td>
                                    <td><form method="post" action="{{route('image.destroy',['id'=>$image->id])}}">{{csrf_field()}} <input type="hidden" name="_method" value="DELETE"/> <button type="submit" class="btn btn-danger form-control" value="{{ $image->id  }}">Delete</button></form></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection