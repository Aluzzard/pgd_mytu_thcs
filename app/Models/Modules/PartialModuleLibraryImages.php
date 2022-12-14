<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class PartialModuleLibraryImages extends Model{
	protected $fillable = [
		'name', 
		'description', 
		'order', 
		'path', 
		'library_id', 
		'url', 
		'status'
	];
	public function library() {
        return $this->belongsTo('App\Models\Modules\ModuleImageLibraries','library_id');
    }
}