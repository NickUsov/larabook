<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Block;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('test');
        $topics = Topic::all();
        return view('topic.index', ['topics'=>$topics,'page'=>'topics', 'id'=>null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic.create', [
            'page'=>'topics',
            'id'=>null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'name'=>'required|unique:topics',
        ]);
        $topic = Topic::add($request->all());
        return redirect()->route('topics.index')->with(['message'=>'It`s Ok, my master!',  'id'=>null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topics = Topic::all();
        $blocks = Block::all()->where('topic_id', $id);
    
        return view('topic.show')->with(['page'=>'topics/'.$id, 'id'=>$id, 'topics'=>$topics, 'blocks'=>$blocks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        return view('topic.edit')->with(['page'=>'edit','topic'=>$topic,  'id'=>null]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|unique:topics'
        ]);
        $topic = Topic::find($id);
        $topic->edit($request->all());
        return redirect()->route('topics.index')->with('message', 'Change is Ok, my master!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::find($id)->delete();
        return redirect()->route('topics.index')->with('message','Deleted');
    }
}
