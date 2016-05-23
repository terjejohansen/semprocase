<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $table = 'youtube';
    public $timestamps = true;
    
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
}
