@extends('layouts.master')
@section('content')
<div class="col-md-6 content">
    {!!Form::open([
        'route'=>'topics.store',
        'method'=>'post'
    ])!!}
    <div class="form-group">
        <label>Name
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </label>        
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{route('topics.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i>Return</a>
    {!!Form::close()!!}
</div>
<div class="col-md-6">
   @include('errors')
   @include('message')
</div>
@endsection
