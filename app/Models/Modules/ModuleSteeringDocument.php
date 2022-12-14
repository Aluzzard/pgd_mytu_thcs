<?php
namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class ModuleSteeringDocument extends Model{
	protected $fillable = [
        'number', 
        'content', 
        'field_id', 
        'type_id', 
        'organization_id', 
        'signor', 
        'date_issue', 
        'date_effect', 
        'file',
        'file_path'
    ];
	public $timestamps = false;

	public function field() {
    	return $this->belongsTo('App\Models\Modules\PartialModuleSteeringDocumentByField', 'field_id', 'id');
    }
    public function type() {
    	return $this->belongsTo('App\Models\Modules\PartialModuleSteeringDocumentOfType', 'type_id', 'id');
    }
    public function organization() {
    	return $this->belongsTo('App\Models\Modules\PartialModuleSteeringDocumentIssuedByOrganizations', 'organization_id', 'id');
    }
}