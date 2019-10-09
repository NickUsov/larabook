@extends('layouts.master')
@section('content')
<div class="md-col-12">
    <table class="table table-stripped">
        <thead>
            <th>id</th>
            <th>Topic Name</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Options</th>
        </thead>
        <tbody>
            @foreach($blocks as $block)
            <tr>
                <td>{{$block->id}}</td>
                <td>{{$block->topic->name}}</td>
                <td>{{$block->title}}</td>
                <td>{{$block->content}}</td>
                <td>
                    <img src="{{$block->getImage()}}" alt="image" class="img-responsive">
                </td>
                <td class="options"><a href="{{route('blocks.edit',$block->id)}}"><i  class="glyphicon glyphicon-pencil"></i></a>
                {!!Form::open([
                    'route'=>['blocks.destroy', $block->id],
                    'method'=>'delete'
                ])!!}
                <button type="submit" onclick="return confirm('Ты серьезно ?')" class="glyphicon glyphicon-remove btn_remove"></button></td>
                {!!Form::close()!!}
            </tr>  
            @endforeach
        </tbody>
        <tfoot>
            <a href="{{route('blocks.create')}}" class="btn btn-success">Create</a>
        </tfoot>
    </table>
    <div class="col-md-6">
        @include('errors')
        @include('message')
    </div>
</div>
    
@endsection