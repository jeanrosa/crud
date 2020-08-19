<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    /*public function user()
    {
        return $this->belongsTo('App\User');
    }*/
    public $timestamps = false;
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    protected $fillable = [
        'title', 'content', 'auth'
    ];
}
