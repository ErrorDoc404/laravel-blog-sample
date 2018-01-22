@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('user.update'))
            <div class="alert alert-success">
                {{ session('user.update') }}
            </div>
        @endif
        <div class="col-lg-3">
            <img src="{{asset('/uploads/images/profile/'.$selectedUser->image_id)}}" alt="{{Auth::user()->name}} Profile Image" class="img-responsive"/>
            <br><br>
        </div>
        <div class="col-lg-9">
            <table class="table" border="0">
                <tr>
                    <td >Name</td>
                    <td>{{$selectedUser->name}}</td>
                </tr>
                <tr>
                    <td>E-Mail Address</td>
                    <td>{{$selectedUser->email}}</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{!empty($selectedUser->contact) ? $selectedUser->contact  : 'Not Enter'}}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{!empty($selectedUser->gender) ? $selectedUser->gender  : 'Not Specified'}}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{!empty($selectedUser->dob) ? $selectedUser->dob : 'Not Enter'}}</td>
                </tr>
            </table>
        </div>
        <br><br>
        <center>
            <a href="{{route('user.index')}}"><button class="btn btn-primary">Back</button></a>
            <a href="{{route('user.edit',$selectedUser->id)}}"> <button  class="btn btn-default" >Edit</button></a>
        </center>
    </div>
@endsection