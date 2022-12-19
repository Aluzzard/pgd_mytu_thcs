<?php

namespace App\Http\Controllers\Modules\UIMenuNavigation;
use App\Http\Controllers\Controller; 
use App\Models\Modules\ModuleArticlesCategories;

class UIMenuNavigationController extends Controller {

    public function tab(){
        $menu_navigation = [];

    	$counter_segment_url = request()->segment(count(request()->segments()));
        $category = ModuleArticlesCategories::whereSlug($counter_segment_url)->first();  
        if( !$category && count(request()->segments()) > 0 ){
            $counter_segment_url = request()->segment(count(request()->segments()) - 1);
            $category = ModuleArticlesCategories::whereSlug($counter_segment_url)->firstOrFail();  
        }
    	$counter_categories = count(ModuleArticlesCategories::whereStatus(1)->get());
        array_push($menu_navigation, $category);
        for ($i=0; $i < $counter_categories; $i++) { 
            if ( $category->id_parent == 0 ) {
                break;
            } else {
                $category = ModuleArticlesCategories::whereId($category->id_parent)->first();
                array_unshift($menu_navigation, $category);
            }
        }        
        return $menu_navigation;
    }
    
}
