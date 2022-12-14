<?php

namespace App\Models\MainStructure;
use Illuminate\Database\Eloquent\Model;

class SysGuestLayout extends Model{
	public $timestamps = false;
	protected $fillable = [
		'name', 
		'avatar', 
		'content',
	];
}