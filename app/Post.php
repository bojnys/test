<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'published_at'
    ];

    protected $dates = ['published_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date);
    }
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function getTagListAttribute(){
        return $this->tags->lists('id');
    }
}