<?php

namespace App\Models\Modules;
use Illuminate\Database\Eloquent\Model;

class ModuleSchoolTimetable extends Model{
	protected $fillable = [
		'name', 
		'date', 
	];
	public $timestamps = false;
}