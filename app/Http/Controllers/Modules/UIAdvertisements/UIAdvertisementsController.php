<?php

namespace App\Http\Controllers\Modules\UIAdvertisements;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleAdvertisement;

class UIAdvertisementsController extends Controller {

    public function tab(){
    	$temp = ModuleAdvertisement::whereIsActive(1)
    								->whereRaw( '  (( NOW() BETWEEN show_from_date AND show_to_date) 
													OR (show_from_date IS NULL AND show_to_date >= NOW())
													OR (show_to_date IS NULL AND show_from_date <= NOW())
													OR (show_from_date IS NULL AND show_to_date IS NULL))' )
    								->get();
        return $temp;
    }

}
