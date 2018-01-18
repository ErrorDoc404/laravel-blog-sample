@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Post</div>

                    <div class="panel-body">
                        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
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
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="emailid" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="emailid" type="email" class="form-control" name="emailid" value="" autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="" autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="contact" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-6">
                                    <input id="contact" type="text" class="form-control" name="contact" value="" autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gneder</label>
                                <div class="col-md-6">
                                    <select name="gender" class="form-control">
                                        <option>-------------------------------</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control" name="dob" value="" autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="col-md-4 control-label">Select Profile Picture</label>
                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" value="" autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <center><input type="submit" value="Add User" class="btn btn-primary" /></center>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection