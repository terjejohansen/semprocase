<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = true;
    /**
     * Get the related videos to the category
     */
    public function videos()
    {
        return $this->belongsToMany('App\Youtube');
    }

}
