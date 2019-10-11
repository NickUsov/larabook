@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($topics as $topic)
                        <li role='presentation' {{$page == 'topics/'.$topic->id||($page=='main'&&$id==$topic->id)?'class=active':''}}>
                            <a href="{{route('topics.show', $topic->id)}}">{{$topic->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                    @foreach($blocks as $block)
                        <div class="col-md-4">
                            <h3>{{$block->title}}</h3>
                            <div class="image_index">
                               <img src="{{$block->getImage()}}" alt="image" class="img_index"> 
                            </div>
                            <p>{{$block->content}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection