@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="jumbotron ">
                <h2>Hello, world!</h2>
                <p>
                    yesterday is history , tomorrow is a mistery.but today is a gift , that is why it is called the present.
                </p>
                <p><a class="btn btn-primary " href="#" role="button">Learn more</a></p>
            </div>
            @foreach($posts as $post)
                <div class="post">

                    <div class="page-header">
                        <h3 style="display: inline"> {{$post->title}}
                        </h3>
                        <span>
                            @foreach($post->tags as  $tag)
                                <span class="label label-default" style="margin-bottom: 100px">{{$tag->name}}</span>
                            @endforeach
                        </span><br>

                    </div>





                    <p>{{mb_strlen(strip_tags($post->content))>200?mb_substr(strip_tags($post->content),0,200).'...':strip_tags($post->content)}}</p>
                    <span style="font-style: italic">{{date("M d Y",strtotime($post->updated_at))}}</span><br><br>
                    <p><a class="btn btn-primary btn-sm" href="{{route('post.show',$post->id)}}" role="button">查看更多 »</a></p>
            </div>

           @endforeach
            {{$posts->links()}}
        </div>

        <div class="col-md-3">
            <div class="list-group ">
                <a href="#" class="list-group-item active">
                    分类
                </a>
                @foreach($categories as $category)
                <a href="#" class="list-group-item">{{$category->name}}</a>
                @endforeach
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    标签
                </a>
                @foreach($tags as $tag)
                    <a href="#" class="list-group-item">{{$tag->name}}</a>
                @endforeach

            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    博客
                </a>
                <a href="http://blog.zhaojie.me/" target="_blank" class="list-group-item">Jeffrey Zhao</a>

            </div>

        </div>
    </div>
    <hr>
    <footer style="padding: 10px 0;">
        <p> <span style="color: #dd4b39">@ysd-pk.com</span> 2016</p>
    </footer>
</div>

@endsection
