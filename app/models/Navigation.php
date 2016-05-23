<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';
    public $timestamps = false;
    
    public function parent() {
        return $this->hasOne('navigation', 'id', 'parent_id');
    }
    
    public function children() {
        return $this->hasMany('navigation', 'parent_id', 'id');
    }
    
    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', NULL)->get();
    } 
    
}
