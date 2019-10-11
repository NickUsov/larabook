<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Block;
class SiteController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        $first = Topic::all()->first();
        $blocks = Block::all()->where('topic_id', $first->id);
        return view('topic.show',[
            'page'=> 'main',
            'topics'=>$topics,
            'blocks'=>$blocks,
            'id'=>$first->id,
        ]);
    }
}
