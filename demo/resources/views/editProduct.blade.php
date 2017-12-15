@extends('layouts.app')
@section('title','Edit Product')
@section('content')
    <div class="container">
        <div class="row">
            <h1 style="color:#0e90d2">Edit Product</h1>
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="{{$item['name']}}">
                        @if($errors->has('name'))
                            <p style="color:red">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" id="exampleTextarea" name="description" rows="3" >{{$item['description']}}</textarea>
                        @if($errors->has('description'))
                            <p style="color:red">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Price</label>
                        <input type="text" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="{{$item['price']}}">
                        @if($errors->has('price'))
                            <p style="color:red">{{$errors->first('price')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Photo upload</label>
                        <input type="file" class="form-control-file" name="photo" aria-describedby="fileHelp">
                        @if($errors->has('photo'))
                            <p style="color:red">{{$errors->first('photo')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection
