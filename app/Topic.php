<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    // protected $primaryKey = 'id';
    // protected $table = 'topics';
    protected $fillable = ['name'];
    public function blocks()
    {
         // связь Topic and Block (Block::class, foreignKey:'topic_id', localKey:'id')
        return $this->hasMany(Block::class, 'topic_id', 'id');
    }
    public static function add($name)
    {
        $topic = new static;
        $topic->fill($name);
        $topic->save();
        return $topic;
    }
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
    public function remove()
    {
        $this->delete();
    }
}
