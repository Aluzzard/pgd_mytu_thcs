<?php
namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class PartialModuleSteeringDocumentOfType extends Model{
	public $timestamps = false;
	protected $fillable = [
		'name'
	];
}