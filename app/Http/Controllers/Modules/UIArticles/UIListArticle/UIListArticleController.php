<?php

namespace App\Http\Controllers\Modules\UIArticles\UIListArticle;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleArticlesCategories;

class UIListArticleController extends Controller {
    //Tin bài theo URL Category
    public function articleBySlugCategory($slug) {
    	$category =	ModuleArticlesCategories::whereSlug($slug)->first();
    	$article = ModuleArticles::whereCategoryId($category->id)->whereStatus(1)->first();
    	return $article;
    }
    //Danh sách các tin bài theo URL Category
    public function articlesBySlugCategory($slug) {
    	$category =	ModuleArticlesCategories::whereSlug($slug)->first();
    	$articles = ModuleArticles::whereCategoryId($category->id)->whereStatus(1)->paginate(10);
    	return $articles;
    }
}
