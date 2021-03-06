@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Post</div>
                    <div class="panel-body">
                        <form action="{{ route('post.update',['id'=> $post->id]) }}" method="post" enctype="multipart/form-data">
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
                                    <input id="title" type="text" class="form-control" name="title" value="{{$post->title}}" required autofocus />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <textarea onkeyup="descFun()" class="form-control" name="description" id="description" >{{$post->description}}</textarea><div style="float: right;" ><span id="countdesc">0</span>/191</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Author</label>
                                <div class="col-md-6">
                                    <select name="author" id="author" class="form-control">
                                        @foreach($users as $key => $user)
                                            <option value="{{$user->id}}" {{$post->user_id==$user->id ? 'selected="selected' :  ''}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
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
                                <label for="tags[]" class="col-md-4 control-label">Select Tags</label>
                                <div class="col-md-6">
                                    <select class="js-example-basic-multiple  form-control" name="tags[]" multiple="multiple">
                                            @foreach($tags as $key=>$tag)
                                                <option value="{{$tag->id}}" {{in_array($tag->name,array_column($post_tags, 'name')) ? 'selected' : ''}}>{{$tag->display_name}}</option>
                                            @endforeach
                                    </select>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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

        $(function () {
            $('.js-example-basic-multiple').select2({
                tags :  true
            });
        });
    </script>
@endsection