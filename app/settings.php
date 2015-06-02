<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model {

    protected $fillable = [
        'title',
        'publicPPP',
        'profilePPP',
        'publicCPP',
        'profileCPP',
        'defaultCommentsProfile',
        'defaultPostsProfile'
    ];


}
