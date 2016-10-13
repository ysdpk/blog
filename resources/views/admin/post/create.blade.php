@extends('admin.main')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap-markdown.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

            <form action="{{route('post.store')}}" method="post">
                {{csrf_field()}}
                <label for="">标题：</label>
                <input name="title" type="text" class="form-control"/><br>
                <label for="">分类：</label>

                <select id="category" class="form-control selectpicker show-tick" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                </select>
                <br><br>
                <label for="">标签：</label>
                <select id="tags" multiple class="form-control selectpicker" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                <br><br>
                <label for="">内容</label>

                <textarea name="body" data-provide="markdown" rows="10" id="mark"></textarea>

                <hr/>
                <button type="submit" class="btn btn-default btn-lg">Submit</button>

            </form>
            </div>
        </div>
    </div>
    <br>
@endsection
@section('js')
    <script src="{{asset('js/markdown.js')}}"></script>
    <script src="{{asset('js/to-markdown.js')}}"></script>
    <script src="{{asset('js/bootstrap-markdown.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('#category').selectpicker();
            $('#category').selectpicker('val','');

            $('#tags').selectpicker();
        });
    </script>
@endsection