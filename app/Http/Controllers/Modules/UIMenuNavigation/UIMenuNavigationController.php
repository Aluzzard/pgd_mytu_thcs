<?php

namespace App\Http\Controllers\Modules\UIMenuNavigation;
use App\Http\Controllers\Controller; 
use App\Models\Modules\ModuleArticlesCategories;

class UIMenuNavigationController extends Controller {

    public function tab(){
    	$counter_segment_url = request()->segment(count(request()->segments()));

    	$counter_categories = count(ModuleArticlesCategories::whereStatus(1)->get());
    	
    // 	// whereSlug(request()->segment(1))->first()
    // 	for ($i=0; $i < $counter_categories; $i++) { 
    // 		$category = ModuleArticlesCategories
    // 	}

    // 	echo '<pre>';
    // print_r($counter_categories);
    // echo '</pre>';die;

    }
    
}
