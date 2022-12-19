<?php

namespace App\Http\Controllers\Modules\UITabArticle;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleArticlesCategories;

class UITabArticleController extends Controller {

    public function tab(){
    	$temp = ModuleArticles::whereStatus(1)
								->whereRaw( '  (( NOW() BETWEEN show_from_date AND show_to_date) 
												OR (show_from_date IS NULL AND show_to_date >= NOW())
												OR (show_to_date IS NULL AND show_from_date <= NOW())
												OR (show_from_date IS NULL AND show_to_date IS NULL))' )
								->get();
        return $temp;
    }
    //Tin bài theo URL Category
    public function articleBySlugCategory($slug) {
    	$category =	ModuleArticlesCategories::whereSlug($slug)->first();
    	$article = ModuleArticles::whereCategoryId($category->id)->whereStatus(1)->first();
    	return $article;
    }
    //Danh sách các tin bài theo URL Category
    public function articlesBySlugCategory($slug) {
    	$category =	ModuleArticlesCategories::whereSlug($slug)->first();
    	$article = ModuleArticles::whereCategoryId($category->id)->whereStatus(1)->firstOrFail();
    	return $article;
    }
}
