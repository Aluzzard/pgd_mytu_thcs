<?php

namespace App\Http\Controllers\Modules\UIVideoYoutube;
use App\Http\Controllers\Controller; 
use DB;

class UIVideoYoutubeController extends Controller {

    public function tab(){
    	$temp = DB::table('module_video_youtubes')
    									->leftJoin('partial_module_library_images','module_video_youtubes.id','=','partial_module_library_images.library_id')
                                        ->where('module_video_youtubes.check_active','=',1)
                                        ->where('module_video_youtubes.id','!=',1)
                                        ->select('module_video_youtubes.*','partial_module_library_images.path')
                                        ->groupBy('module_video_youtubes.id')
                                        ->get();
        return $temp;
    }

}
