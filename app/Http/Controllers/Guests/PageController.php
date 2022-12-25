<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller; 
use DB;
//Models
use App\Models\MainStructure\SysWebsiteInformation;
// use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleContacts;
use App\Models\Modules\ModuleSchools;
// use App\Models\Modules\ModuleConstructionUsed;
// use App\Models\Modules\PartialModuleConstructionUsedImages;
// use App\Models\Modules\ModuleWebsiteLinks;
// use App\Models\Modules\ModuleAdvertisement;
use App\Models\Modules\ModuleSteeringDocument;
use App\Models\Modules\ModuleRulesOfLaw;
use App\Models\Modules\ModuleImageLibraries;
use App\Models\Modules\PartialModuleLibraryImages;
use App\Models\Modules\ModuleVideoYoutube;


class PageController extends Controller {

    public function index(){
        
        $data['featured_news'] = \App\Http\Controllers\Modules\UIFeaturedNews\UIFeaturedNewsController::tab();
        $data['articles'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::tab();
        $data['advertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
        $data['vertical_menus'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
        $data['website_links'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
        $data['steering_documents'] = \App\Http\Controllers\Modules\UISteeringDocument\UISteeringDocumentController::tab();
        $data['rules_of_law'] = \App\Http\Controllers\Modules\UIRulesOfLaw\UIRulesOfLawController::tab();

        $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();

        $data['schools'] = ModuleSchools::whereIsActive(1)->get();


        return view('guests.pages.home.index', $data);
    }

    public function redirect($slug) {
        $data['menu_navigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
        $category = \App\Models\Modules\ModuleArticlesCategories::whereSlug($slug)->whereStatus(1)->first();
        if($slug == 'lien-he') {
            $data['menu_navigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
            return view('guests.pages.contact.contact', $data);
        } 
        else if($slug == 'van-ban'){
            $data['vertical_menus'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
            $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();
            $data['table_html'] = $this->document_htmlTable('steering_documents');
            $data['type'] = 'steering_documents';
            return view('guests.pages.document.list', $data);
        }
        else if($slug == 'thu-vien-anh'){
            $data['vertical_menus'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
            $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();
            $data['articles'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::tab();
            $data['menu_navigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
            $data['advertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
            $data['website_links'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
            
            return view('guests.pages.libraryimages.list', $data);
        }
        else {
            $data['vertical_menus'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
            if($category->display_method == 1){ //Đơn tin
                $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();
                $data['article'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::articleBySlugCategory($slug);
                $data['articles'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::tab();
                $data['advertisements'] = \App\Http\Controllers\Modules\UIAdvertisements\UIAdvertisementsController::tab();
                $data['website_links'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
                $data['menu_navigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
                return view('guests.pages.post.only',$data);

            } 
            else if($category->display_method == 2){ //Danh sách tin bài
                $data['website_links'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
                $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();
                $data['articles'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::articlesBySlugCategory($slug);
                return view('guests.pages.post.list',$data);
            }
            abort('404'); 
        }
    }
    public function redirectDetail($slug, $slug1) {
        $data['vertical_menus'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
        $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();
        $data['website_links'] = \App\Http\Controllers\Modules\UIWebsiteLinks\UIWebsiteLinksController::tab();
        $data['menu_navigation'] = \App\Http\Controllers\Modules\UIMenuNavigation\UIMenuNavigationController::tab();
        $data['article'] = \App\Http\Controllers\Modules\UIDetailArticle\UIDetailArticleController::articleBySlug($slug1);
        $data['articles'] = \App\Http\Controllers\Modules\UITabArticle\UITabArticleController::tab();
        return view('guests.pages.post.detail', $data);
    }

    public function contactPost(Request $request){
        
    }
    //--------------------
    public function document_htmlTable($type){
        $type == 'steering_documents' ? $documents = ModuleSteeringDocument::orderBy('id', 'desc')->get()
                                      : $documents = ModuleRulesOfLaw::orderBy('id', 'desc')->get();
        
        $table = "";
        $count = count($documents);
        $row = 0;
        if($count > 0){
            foreach ($documents as $document) {
                $row+=1;
                $table .="<tr>";
                $table .="<td>".$document->field->name."</td>";
                $table .="<td>".$document->type->name."</td>";
                $table .="<td>".$document->organization->name."</td>";
                $table .="<td>$row</td>";
                $table .="<td>$document->number</td>";
                $table .="<td>".date('d/m/Y', strtotime($document->date_effect))."</td>";
                $table .="<td style='text-align: justify;'>";
                                if($type == 'steering_documents'){
                                    $table .= "<a href='".route('document_minTable_detail', $document->id)."'>$document->content</a>";
                                }
                                else {
                                    $table .= "<a href='".route('document_rules_of_law_detail', $document->id)."'>$document->content</a>";
                                }
                $table .= "</td>";
                $table .= "<td>
                                <a target='_blank' href='". $document->file_path ."'>
                                    <i class='fa fa-paperclip'></i>
                                </a>
                           </td>";
                $table .= "</tr>";
            }
        }
        return $table;
    }//document_minTable
    //--------CHI TIẾT VBCĐ---------------
    public function document_minTable_detail($id){
        $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
        $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
        $data['category'] = ModuleArticlesCategories::whereSlug('van-ban-dieu-hanh')->firstOrFail();
        $data['document'] = ModuleSteeringDocument::where('id', $id)->first();
        $data['type'] = 'steering_documents';
        return view('guests.pages.document.detail', $data);
    }
    public function document_rules_of_law_detail($id){
        $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
        $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
        $data['category'] = ModuleArticlesCategories::whereSlug('van-ban-quy-pham-phap-luat')->firstOrFail();
        $data['document'] = ModuleRulesOfLaw::where('id', $id)->first();
        $data['type'] = 'rules_of_law';
        return view('guests.pages.document.detail', $data);
    }
    //--------END CHI TIẾT VBCĐ-----------
    public function imagelibraryDetail($id){
        $data['vertical_menus'] = \App\Http\Controllers\Modules\UIDropdownMenu\UIDropdownMenuController::tab();
        $data['image_libraries'] = \App\Http\Controllers\Modules\UIImageLibrary\UIImageLibraryController::tab();
        $data['images'] = PartialModuleLibraryImages::whereLibraryId($id)->get(); // Hình trong thư viện ảnh được chọn

        return view('guests.pages.libraryimages.image', $data);
    }
}
