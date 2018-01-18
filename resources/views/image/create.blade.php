@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Images</div>

                    <div class="panel-body">
                        <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Select Images</label>
                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control" name="name" />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <center><input type="submit" value="Submit Post" class="btn btn-primary" /></center>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection