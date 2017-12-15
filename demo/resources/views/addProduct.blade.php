@extends('layouts.app')
@section('title','Add Product')
@section('content')
<div class="container">
    <div class="row">
        <h1 style="color:#0e90d2">Add Product</h1>
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" enctype="multipart/form-data" action="{{url('product/addProduct')}}">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <p style="color:red">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="exampleTextarea">Description</label>
                    <textarea class="form-control" id="exampleTextarea" name="description" rows="3" >{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <p style="color:red">{{$errors->first('description')}}</p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="description" aria-describedby="emailHelp" name="price" placeholder="Enter Price" value="{{ old('price') }}">
                    @if($errors->has('price'))
                        <p style="color:red">{{$errors->first('price')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Photo upload</label>
                    <input type="file" class="form-control-file" name="photo" id="exampleInputFile" aria-describedby="fileHelp">
                    @if($errors->has('photo'))
                        <p style="color:red">{{$errors->first('photo')}}</p>
                    @endif
                </div>
                <input type="submit" name="ok" value="Add" class="btn btn-success">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@endsection
