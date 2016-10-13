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
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit',$category->id)}}">编辑</a>
                            <form action="{{route('category.destroy',$category->id)}}" method="post" style="display: inline">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button class="btn-link">删除</button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection