<?php

namespace App\Http\Controllers\MainStructure\Guests;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Controllers
//Models
use App\Models\Modules;

class PageController extends Controller {

	public function home() {
        $data['banner'] = ModuleBannerFooter::whereIsActive('1')->orderBy('is_default', desc)->first();
        echo '<pre>';
    print_r($data['banner']);
    echo '</pre>';die;
    	$category = ModuleArticlesCategories::whereStatus('1')->whereSlug($slug)->firstOrFail();
        return view('mainstructure.pages.guests.two_column');

    }
    public function detailCategory($slug) {
    	$category = ModuleArticlesCategories::whereStatus('1')->whereSlug($slug)->firstOrFail();
        echo '<pre>';
    print_r($category);
    echo '</pre>';die;

    }
    public function detailArticle($category,$detail) {
        echo '<pre>';
	    print_r($slug2);
	    echo '</pre>';die;

    }

}
