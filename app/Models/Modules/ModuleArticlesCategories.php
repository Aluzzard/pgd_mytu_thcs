<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleArticlesCategories extends Model{
    protected $fillable = [
        'name', 
        'description',
        'slug', 
        'url',
        'display_method',
        'display_v_order',
        'display_h_order',
        'status',
        'new_window',
        'show_h_menu',
        'show_v_menu'
    ];

	public function childs() {
        return $this->hasMany('App\Models\Modules\ModuleArticlesCategories','id_parent','id') ;
    }
}