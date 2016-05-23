<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';
    public $timestamps = true;
    
    public function parent() {
        return $this->hasOne('navigation', 'id', 'parent_id');
    }
    
    public function children() {
        return $this->hasMany('navigation', 'parent_id', 'id');
    }    
}
