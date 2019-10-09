@extends('layouts.master')
@section('content')
<div class="md-col-12">
    <table class="table table-stripped">
        <thead>
            <th>id</th>
            <th>name</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Options</th>
        </thead>
        <tbody>
            @foreach($topics as $topic)
            <tr>
                <td>{{$topic->id}}</td>
                <td>{{$topic->name}}</td>
                <td>{{$topic->created_at}}</td>
                <td>{{$topic->updated_at}}</td>
                <td class="options"><a href="{{route('topics.edit',$topic->id)}}"><i  class="glyphicon glyphicon-pencil"></i></a>
                {!!Form::open([
                    'route'=>['topics.destroy', $topic->id],
                    'method'=>'delete'
                ])!!}
                <button type="submit" onclick="return confirm('Ты серьезно ?')" class="glyphicon glyphicon-remove btn_remove"></button></td>
                {!!Form::close()!!}
            </tr>
                
            @endforeach
        </tbody>
        <tfoot>
            <a href="{{route('topics.create')}}" class="btn btn-success">Create</a>
        </tfoot>
    </table>
    <div class="col-md-6">
   @include('errors')
   @include('message')
</div>
</div>
    
@endsection