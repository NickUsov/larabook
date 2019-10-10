<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Block extends Model
{
    
    protected $fillable = ['title', 'content', 'topic_id'];
    public function topic()
    {
        return $this->hasOne(Topic::class, 'id', 'topic_id');
    }
    public static function add($fields)
    {
        $block = new static;
        $block->fill($fields);
        $block->save();
        return $block;
    }
    public function uploadImage($image)
    {
        if($image == null){
            return;
        }
        else{
            Storage::delete('uploads/'.$this->image_path);
            $image_name = Str::random(10).'.'.$image->extension();
            $image->storeAs('uploads', $image_name);
            $this->image_path = $image_name;
            $this->save();
        }
        
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
    public function remove()
    {
        Storage::delete('uploads/'.$this->image_path);
        $this->delete();
    }
    public function getImage()
    {
        if($this->image_path == null){
            return '/uploads/no-image.png';
        }
        else{
            return '/uploads/'.$this->image_path;
        }
    }
}
