@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Post</div>
                    <div class="panel-body">
                        {!! Form::model($editUser,['route' => ['user.update' , 'id'=>$editUser->id],'method' => 'put' , 'enctype' => 'multipart/form-data' ]) !!}
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
                                {!! Form::label('name','Name' , array('class'=>'col-md-4 control-label')) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name',$editUser->name,array('id'=>'name','class'=>'form-control')) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('contact','Contact' , array('class'=>'col-md-4 control-label')) !!}
                                <div class="col-md-6">
                                    {!! Form::text('contact',$editUser->contact,array('id'=>'contact','class'=>'form-control')) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('gender','Gender' , array('class'=>'col-md-4 control-label')) !!}
                                <div class="col-md-6">
                                    {!! Form::select('gender',[''=>'-------------------------------','male'=>'Male','female'=>'Female'],$editUser->gender,['class'=>'form-control']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('dob','Date of Birth' , array('class'=>'col-md-4 control-label')) !!}
                                <div class="col-md-6">
                                    {!! Form::date('dob',$editUser->dob,array('id'=>'dob','class'=>'form-control')) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('image','Change Image' , array('class'=>'col-md-4 control-label')) !!}
                                <div class="col-md-6">
                                    {!! Form::file('image',array('id'=>'image','class'=>'form-control')) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <center>
                                    {!! Form::submit('Submit Post',array('class'=>'btn btn-primary')) !!}
                                </center>
                                <div class="clearfix"></div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection