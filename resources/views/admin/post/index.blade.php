@extends('admin.main')
@section('content')
    <div class="container">
        <div class="row">

           <div class="col-md-10 col-md-offset-1">

               <table class="table table-hover">
                   <thead>
                   <tr>
                       <th>#</th>
                       <th>标题</th>
                       <th>目录</th>
                       <th>标签</th>
                       <th>内容</th>
                       <th>操作</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($posts as $post)
                       <tr>
                           <td>{{$post->id}}</td>
                           <td>{{$post->title}}</td>
                           <td>{{$post->category->name}}</td>
                           <td>
                                @foreach($post->tags as $tag)
                                   <label for=""class="label label-default"> {{$tag->name}}</label>
                                @endforeach
                           </td>
                           <td>{{mb_strlen(strip_tags($post->content))>40?mb_substr(strip_tags($post->content),0,40).'...':strip_tags($post->content)}}</td>
                           <td>
                               <a href="{{route('post.edit',$post->id)}}">编辑</a>
                               <form action="{{route('post.destroy',$post->id)}}" method="post" style="display: inline">
                                   {{csrf_field()}}
                                   {{method_field('delete')}}
                                   <button  type="submit" class="btn-link">删除</button>
                               </form>
                           </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
               {{$posts->links()}}
           </div>
        </div>
    </div>
@endsection