<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class PartialModuleVideoYoutubeCategories extends Model{
	protected $fillable = [
		'name', 
		'sort', 
		'url', 
		'content',
	];
}