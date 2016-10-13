@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <form action="{{route('tag.store')}}" method="post">
                    {{csrf_field()}}
                    <label for="">名称：</label>
                    <input name="name" type="text" class="form-control"/>
                    <hr/>
                    <button type="submit" class="btn btn-default btn-lg">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
