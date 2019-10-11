<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Block;
use App\Topic;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::all();
        //dd($blocks);
        return view('block.index',['blocks'=>$blocks, 'page'=>'blocks', 'id'=>null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('block.create', [
            'page'=>'blocks',
            'topics'=>$topics,
            'id'=>null
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
        $this->validate($request, [
            'title'=> 'required',
            'content'=> 'required',
            'image_path'=> 'nullable|image',
        ]);
        $blocks = Block::add($request->all());
        $blocks->uploadImage($request->file('image_path'));
        return redirect()->route('blocks.index')->with(['message'=>'Block was adding successfull', 'id'=>null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = Topic::all();
        $block = Block::find($id);
        return view('block.edit')->with(['page'=>'edit','block'=>$block, 'topics'=>$topics,'id'=>$id]);
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
            'title'=> 'required',
            'content'=> 'required',
            'image_path'=> 'nullable|image',
        ]);
        $block = Block::find($id);
        $block->edit($request->all());
        $block->uploadImage($request->file('image_path'));
        return redirect()->route('blocks.index')->with('message', 'Change is Ok, my master!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Block::find($id)->remove();
        return redirect()->route('blocks.index')->with('message','Deleted');
    }
}
