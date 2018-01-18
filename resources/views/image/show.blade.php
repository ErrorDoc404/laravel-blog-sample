@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Image List</div>
                    <div class="panel-body">
                        Image : {{$imageShow->name}}<br>
                        View : <image src="{{ URL::to('/') }}/uploads/images/{{$imageShow->name}}" class="img-responsive" /><br>
                        <a href="{{route('image.index')}}"><button class="btn btn-primary">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection