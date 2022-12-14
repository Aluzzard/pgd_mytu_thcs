<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleVideoYoutube extends Model{
	protected $fillable = [
		'name', 
		'link', 
		'content', 
		'category_id',
		'check_new', 
		'check_outstanding', 
		'check_internal', 
		'check_active',
		'show_from_date',
		'show_to_date'
	];
	public function category() {
        return $this->belongsTo('App\Models\Modules\PartialModuleVideoYoutubeCategories','category_id');
    }
}
