<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class PartialModuleServicesBusinessesImages extends Model{
	protected $fillable = [
		'name', 
		'description', 
		'order', 
		'path', 
		'library_id', 
		'url', 
		'status'
	];
	public function product() {
        return $this->belongsTo('App\Models\Modules\ModuleServicesBusinesses','product_id');
    }
}