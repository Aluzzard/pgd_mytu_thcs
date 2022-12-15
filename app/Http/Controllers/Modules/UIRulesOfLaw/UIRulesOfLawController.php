<?php

namespace App\Http\Controllers\Modules\UIRulesOfLaw;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleRulesOfLaw;

class UIRulesOfLawController extends Controller {

    public function tab(){
        return ModuleRulesOfLaw::orderBy('date_effect','desc')->get();
    }

}
