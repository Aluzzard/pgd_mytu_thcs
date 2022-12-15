<?php

namespace App\Http\Controllers\Modules\UIFeaturedNews;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleArticles;

class UIFeaturedNewsController extends Controller {

    public function tab(){
        return ModuleArticles::whereStatus(1)->whereFeaturedNews(1)->orderby('created_at', 'desc')->get();
    }

}
