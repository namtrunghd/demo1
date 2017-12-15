<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Simple E-commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/themes/css/bootstrappage.css')}}" rel="stylesheet"/>
    <!-- global styles -->
    <link href="{{asset('frontend/themes/css/flexslider.css')}}" rel="stylesheet"/>
    <link href="{{asset('frontend/themes/css/main.css')}}" rel="stylesheet"/>
    <!-- scripts -->
    <script src="{{asset('frontend/themes/js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/themes/js/superfish.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        p.name{
            white-space: nowrap;
            width: 200px;
            height: 18px;
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div id="top-bar" class="container">
    <div class="row">

        <div class="span12">
            <div class="account pull-right">
                <ul class="user-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->admin==1)
                                    <li>
                                        <a href="{{ url('/product/viewProduct') }}">Dashboard</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @else
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="wrapper" class="container">
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <br/>
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                                <div class="item">
                                    <ul class="thumbnails">
                                        @foreach($data as $item)
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="#"><img src="{{asset('/public/upload/img-product')}}/{{$item->photo}}" /></a></p>
                                                <a href="#" class="title"><p class="name">{{$item->name}}</p></a><br/>
{{--                                                <a href="#" class="title">{{$item->description}}</a><br/>--}}
                                                <p class="price">{{ number_format($item->price) }} VND</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>
                            <div class="clearfix"></div>
                            <ul class="pagination pull-right">
                                {{ $data->links() }}
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

</body>
</html>