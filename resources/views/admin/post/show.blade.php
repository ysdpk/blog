@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3 style="display: inline"> {{$post->title}}
                    </h3>
                    <span>
                        @foreach($post->tags as  $tag)
                        <span class="label label-default" style="margin-bottom: 100px">{{$tag->name}}</span>
                        @endforeach
                    </span><br>
                </div>
                <p>{!! $post->content !!}</p>
                <span style="font-style: italic">{{date("M d Y",strtotime($post->updated_at))}}</span><br><br>
                <br><br>
                <!-- UY BEGIN -->
                <div id="uyan_frame"></div>
                <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=2116286"></script>
                <!-- UY END -->
            </div>
        </div>
    </div>
@endsection