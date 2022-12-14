<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleImageLibraries extends Model{
	protected $fillable = [
		'name', 
		'description', 
		'status'
	];

	public function images() {
        return $this->hasMany('App\Models\Modules\PartialModuleLibraryImages','library_id');
    }
}