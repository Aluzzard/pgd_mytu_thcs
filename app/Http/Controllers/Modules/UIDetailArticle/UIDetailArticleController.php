<?php

namespace App\Http\Controllers\Modules\UIDetailArticle;
use App\Http\Controllers\Controller; 

use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleArticlesCategories;

class UIDetailArticleController extends Controller {

    public function articleBySlug($slug) {
        $article = ModuleArticles::whereStatus(1)
								->whereRaw( '  (( NOW() BETWEEN show_from_date AND show_to_date) 
												OR (show_from_date IS NULL AND show_to_date >= NOW())
												OR (show_to_date IS NULL AND show_from_date <= NOW())
												OR (show_from_date IS NULL AND show_to_date IS NULL))' )
								->whereSlug($slug)
								->first();
        return $article;
    }
}
