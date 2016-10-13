<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{--<link rel="stylesheet" href="{{asset('css/animate.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/todc-bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    @yield('css')
    <style>
        .fa-btn {
            margin-right: 6px;
        }
        body{
            font-family: "Microsoft YaHei";
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-toolbar navbar-fixed-top ">
    <div class="container">

        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admin') }}">
                控制台
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">文章管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('post.create')}}">新建文章</a></li>
                        <li><a href="{{url('post')}}">查看文章</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">目录管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('category.create')}}">新建目录</a></li>
                        <li><a href="{{url('category')}}">查看目录</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">标签管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('tag.create')}}">新建标签</a></li>
                        <li><a href="{{url('tag')}}">查看标签</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/') }}"><i class="fa fa-btn fa-home"></i>前台</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>登出</a></li>
                        </ul>
                    </li>

            </ul>
        </div>
    </div>
</nav>
<div style="height: 60px"></div>

@if(Session::has('success'))
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{Session::get('success')}}{{Session::forget('success')}}
            </div>
        </div>
    </div>
@endif
@if(count($errors)>0)
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> {{$error}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@yield('content')

<!-- JavaScripts -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('js')
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
