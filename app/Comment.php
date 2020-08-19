<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function publication()
    {
        return $this->belongsTo('App\Publication');
    }
    protected $fillable = [
        'status', 'content'
    ];
}
