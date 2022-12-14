<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleArticles extends Model{
    protected $fillable = [
        'user_id', 
        'category_id', 
        'title',
        'slug',
        'avatar',
        'status',
        'new_window',
        'new_news',
        'featured_news',
        'description',
        'show_from_date',
        'show_to_date',
        'content',
        'meta_title',
        'meta_description',
        'created_at'
    ];

	public function user() {
        return $this->belongsTo('App\Models\MainStructure\AccountUsers');
    }
    public function category() {
        return $this->belongsTo('App\Models\Modules\ModuleArticlesCategories','category_id','id');
    }
}