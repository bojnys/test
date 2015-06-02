<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'message',
        'slug',
        'user_id',
        'post_id',
        'published_at',
        'deleted'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
