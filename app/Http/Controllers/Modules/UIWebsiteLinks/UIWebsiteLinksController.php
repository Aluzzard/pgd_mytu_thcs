<?php

namespace App\Http\Controllers\Modules\UIWebsiteLinks;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleWebsiteLinks;

class UIWebsiteLinksController extends Controller {

    public function tab(){
    	$temp = ModuleWebsiteLinks::whereStatus(1)
    								->orderBy('sort', 'asc')
    								->get();
        return $temp;
    }

}
