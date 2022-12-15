<?php

namespace App\Http\Controllers\Modules\UISteeringDocument;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleSteeringDocument;

class UISteeringDocumentController extends Controller {

    public function tab(){
        return ModuleSteeringDocument::orderBy('date_effect','desc')->get();
    }

}
