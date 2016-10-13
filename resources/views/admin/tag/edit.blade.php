@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <form action="{{route('tag.update',$tag->id)}}" method="post">
                    {{method_field('put')}}
                    {{csrf_field()}}
                    <label for="">标题：</label>
                    <input type="text"class="form-control" name="name" value="{{$tag->name}}">
                    <hr/>
                    <button type="submit" class="btn btn-default btn-lg">Submit</button>

                </form>
            </div>
        </div>
    </div>
    <br>
@endsection
