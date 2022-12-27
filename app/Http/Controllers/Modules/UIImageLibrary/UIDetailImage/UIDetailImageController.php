<?php

namespace App\Http\Controllers\Modules\UIImageLibrary\UIDetailImage;
use App\Http\Controllers\Controller; 

use App\Models\Modules\PartialModuleLibraryImages;

class UIDetailImageController extends Controller {

    public function detail($id){
    	$temp = PartialModuleLibraryImages::whereLibraryId($id)->get();
        return $temp;
    }

}
