@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Post</div>
                    <div class="panel-body">
                        <form action="{{ route('post.update',['id'=> $editPost->id]) }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{$editPost->title}}" required autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <textarea onkeyup="descFun()" class="form-control" name="description" id="description" >{{$editPost->description}}</textarea><div style="float: right;" ><span id="countdesc">0</span>/191</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Author</label>
                                <div class="col-md-6">
                                    <input id="author" type="text" class="form-control" name="author" value="{{  Auth::user() ?  Auth::user()->name : 'Guest' }}"   />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Change Image</label>
                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control" name="name"  />
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
<script>
    var count = null;
    var desc;
    window.onload = setInterval(function(){
        descFun();
    },10);
    function descFun(){
        desc  = document.getElementById('description').value;
        count = countDesc();
        printDesc();
    }

    function  countDesc() {
        var valuedesc = desc;
        return valuedesc.length;
    }

    function printDesc(){
        document.getElementById('countdesc').innerHTML = count.toString();
    }
</script>