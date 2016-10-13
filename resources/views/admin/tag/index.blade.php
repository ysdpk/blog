@extends('admin.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>
                                <a href="{{route('tag.edit',$tag->id)}}">编辑</a>
                                <form style="display: inline" action="{{route('tag.destroy',$tag->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button class="btn-link">删除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{$tags->links()}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection