<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller; 

class PageController extends Controller {

    public function index(){
        
        $data['UIFeaturedNews'] = \App\Http\Controllers\Modules\UIFeaturedNews\UIFeaturedNewsController::tab();
        $data['UITabArticle'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::tab();
        $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
        $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
        $data['UIDropdownMenu'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
        $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
        $data['UISteeringDocument'] = \App\Http\Controllers\Modules\UISteeringDocument\UISteeringDocumentController::tab();
        $data['UIRulesOfLaw'] = \App\Http\Controllers\Modules\UIRulesOfLaw\UIRulesOfLawController::tab();
        $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
        return view('guests.pages.home.index', $data);
    }

    public function redirect($slug) {
        $data['UIMenuNavigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
        $category = \App\Models\Modules\ModuleArticlesCategories::whereSlug($slug)->whereStatus(1)->first();
        if($slug == 'lien-he') {
            return view('guests.pages.contact.contact', $data);
        } 
        else if($slug == 'van-ban'){
            $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
            $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
            $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
            $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
            $data['UISteeringDocumentList'] = \App\Http\Controllers\Modules\UISteeringDocument\UISteeringDocumentController::list();
            return view('guests.pages.document.list', $data);
        }
        else if($slug == 'thu-vien-anh'){
            $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
            $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
            $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
            $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
            return view('guests.pages.libraryimages.list', $data);
        }
        else if($slug == 'video-clip'){
            $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
            $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
            $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
            $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
            $data['UIVideoYoutube'] = \App\Http\Controllers\Modules\UIVideoYoutube\UIVideoYoutubeController::tab();
            return view('guests.pages.video.index', $data);
        }
        else {
            if($category->display_method == 1){ //Đơn tin
                $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
                $data['UIDetailArticle'] = \App\Http\Controllers\Modules\UIArticles\UIDetailArticle\UIDetailArticleController::articleBySlug($slug);
                $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
                $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
                $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
                return view('guests.pages.post.only',$data);
            } 
            else if($category->display_method == 2){ //Danh sách tin bài
                $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
                $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
                $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
                $data['UIListArticle'] = \App\Http\Controllers\Modules\UIArticles\UIListArticle\UIListArticleController::articlesBySlugCategory($slug);
                $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
                return view('guests.pages.post.list',$data);
            }
            abort('404'); 
        }
    }
    public function detailArticle($slug, $slug1) {
        $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
        $data['UIMenuNavigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
        $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
        $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
        $data['UIDetailArticle'] = \App\Http\Controllers\Modules\UIArticles\UIDetailArticle\UIDetailArticleController::articleBySlug($slug1);
        $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
        return view('guests.pages.post.detail', $data);
    }
    //--------CHI TIẾT VBCĐ---------------
    public function detailSteeringDocument($id){
        $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
        $data['UIWebsiteLinks'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
        $data['UIHotNews'] = \App\Http\Controllers\Modules\UIHotNews\UIHotNewsController::tab();
        $data['UIAdvertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
        $data['UISteeringDocumentDetail'] = \App\Http\Controllers\Modules\UISteeringDocument\UISteeringDocumentController::detail($id);
        return view('guests.pages.document.detail', $data);
    }
    //--------END CHI TIẾT VBCĐ-----------

    public function imageLibraryDetail($id){
        $data['UIImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibrary\UIImageLibraryController::tab();
        $data['UIDetailImageLibrary'] = \App\Http\Controllers\Modules\UIImageLibrary\UIDetailImage\UIDetailImageController::detail($id);
        return view('guests.pages.libraryimages.image', $data);
    }
}
