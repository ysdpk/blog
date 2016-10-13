@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header">
                    <h3 class="title">这个博客</h3>

                </div>
                <p>应该是高质量的编程博客.</p>
                <div class="page-header">
                    <h3 class="title">管理员</h3>

                </div>
                <p>
                    <img src="{{asset('img/avatar.png')}}" width="35px" height="35px" style="border-radius: 50%">
                    <span> &nbsp;忧伤的嫖客 </span>
                    <a href="">@github</a>
                </p>
                <div class="page-header">
                    <h3 class="title">联系我</h3>
                </div>
                <p>一旦发生重大事件或紧急情况时，请通过 <span class="btn-link"> ysdpk123@gmail.com</span>联系我.</p>

            </div>
        </div>
    </div>
@endsection