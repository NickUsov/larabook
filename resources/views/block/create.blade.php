@extends('layouts.master')
@section('content')
<div class="col-md-6 content">
    {!!Form::open([
        'route'=>'blocks.store',
        'method'=>'post'
    ])!!}
    <div class="form-group">
        <label>Select Theme
            <select name="topic_id" class="form-control">
                @foreach($topics as $topic)
                    <option value="{{$topic->id}}">{{$topic->name}}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="form-group">
        <label>Title
            <input type="text" class="form-control" name="title" value="{{old('name')}}">
        </label>
    </div>
    <div class="form-group">
        <label>Content
            <textarea class="form-control" name="content" value="{{old('name')}}"></textarea>
        </label>
    </div>
    <div class="form-group">
        <label>Image
            <input type="file" class="form-control" name="image_path" value="{{old('name')}}">
        </label>         
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{route('blocks.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i>Return</a>
    {!!Form::close()!!}
</div>
<div class="col-md-6">
   @include('errors')
   @include('message')
</div>
@endsection
