<?php

namespace App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleArticles;
use DB;

class UIImageLibraryController extends Controller {

    public function tab(){
    	$temp = DB::table('module_image_libraries')
    									->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
        return $temp;
    }

}
