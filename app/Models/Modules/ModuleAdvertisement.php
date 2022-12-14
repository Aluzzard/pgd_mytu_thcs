<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleAdvertisement extends Model{
	protected $fillable = [
		'name', 
		'is_active', 
		'type', 
		'show_from_date', 
		'show_to_date', 
		'content',
	];
}