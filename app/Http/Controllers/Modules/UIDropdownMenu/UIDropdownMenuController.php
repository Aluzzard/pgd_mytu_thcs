<?php

namespace App\Http\Controllers\Modules\UIDropdownMenu;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleArticlesCategories;

class UIDropdownMenuController extends Controller {

    public function tab(){
    	$temp = ModuleArticlesCategories::whereStatus(1)
    									->whereShowVMenu(1)
    									->orderBy('display_v_order')
    									->get();
        return $temp;
    }

}
