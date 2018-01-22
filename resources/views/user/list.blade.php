@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('user.store'))
                    <div class="alert alert-success">
                        {{ session('user.store') }}
                    </div>
                @endif
                    @if (session('user.destroy'))
                        <div class="alert alert-success">
                            {{ session('user.destroy') }}
                        </div>
                    @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>

                                    <td><a href="{{route('user.show',['id'=>$user->id])}}"><button type="submit"  class="btn btn-success form-control" value="{{ $user->id  }}">View</button></a> </td>
                                    <td>
                                        {!! Form::model($user,['route' => ['user.destroy' , 'id'=>$user->id],'method' => 'delete']) !!}
                                        {!! Form::submit('Delete',array('class'=>'btn btn-danger form-control')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection