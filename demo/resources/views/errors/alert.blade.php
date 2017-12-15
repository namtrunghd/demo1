@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
    @endforeach
@endif

@if(Session::has('error'))
    <div class="container">
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>{{Session::get('error')}}</p>
            </div>
        </div>
    </div>
@endif

@if(Session::has('success'))
    <div class="container">
        <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>{{Session::get('success')}}</p>
            </div>
        </div>
    </div>
@endif