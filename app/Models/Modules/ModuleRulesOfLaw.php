<?php
namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Model;

class ModuleRulesOfLaw extends Model{
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
    	return $this->belongsTo('App\Models\Modules\PartialModuleRulesOfLawByField', 'field_id', 'id');
    }
    public function type() {
    	return $this->belongsTo('App\Models\Modules\PartialModuleRulesOfLawByType', 'type_id', 'id');
    }
    public function organization() {
    	return $this->belongsTo('App\Models\Modules\PartialModuleRulesOfLawByOrganizations', 'organization_id', 'id');
    }
}