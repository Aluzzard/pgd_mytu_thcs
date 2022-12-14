<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
use DB;
//Models
use App\Models\MainStructure\SysWebsiteInformation;
use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleArticlesCategories;
use App\Models\Modules\ModuleContacts;
use App\Models\Modules\ModuleSchools;
// use App\Models\Modules\ModuleConstructionUsed;
// use App\Models\Modules\PartialModuleConstructionUsedImages;
use App\Models\Modules\ModuleWebsiteLinks;
use App\Models\Modules\ModuleAdvertisement;
use App\Models\Modules\ModuleSteeringDocument;
use App\Models\Modules\ModuleRulesOfLaw;
use App\Models\Modules\ModuleImageLibraries;
use App\Models\Modules\PartialModuleLibraryImages;
// use App\Models\Modules\ModulePaintBrand;
// use App\Models\Modules\ModulePaintCategories;
// use App\Models\Modules\ModulePaintProducts;
// use App\Models\Modules\PartialModulePaintProductImages;
use App\Models\Modules\ModuleVideoYoutube;
//Controllers

class PageController extends Controller {

    public function index(){
        
        $data['featured_news'] = ModuleArticles::whereStatus(1)->whereFeaturedNews(1)->orderby('created_at', 'desc')->get();
        // $data['sliders'] = PartialModuleLibraryImages::whereLibraryId(1)->get();
        $data['articles'] = ModuleArticles::whereStatus(1)->orderby('created_at', 'desc')->get();
        // $data['news_categories'] = ModuleArticlesCategories::whereIdParent(8)->get();
        $data['website_links'] = ModuleWebsiteLinks::whereStatus(1)->orderBy('sort', 'asc')->get();
        $data['advertisements'] = ModuleAdvertisement::whereIsActive(1)->orderby('created_at', 'desc')->get();
        $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();

        $data['steering_documents'] = ModuleSteeringDocument::orderBy('date_effect','desc')->get();
        $data['rules_of_law'] = ModuleRulesOfLaw::orderBy('date_effect','desc')->get();

        $data['documents_new'] = DB::table('module_rules_of_laws')
                                    ->select('module_rules_of_laws.*')
                                    ->union( DB::table('module_steering_documents')->select('module_steering_documents.*') )
                                    ->orderBy('date_effect','desc')->get();


        $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
        $data['schools'] = ModuleSchools::whereIsActive(1)->get();
        //     echo '<pre>';
        // print_r( $data['banner_footer'] );
        // echo '</pre>';die;

            // $data['enterprises'] = ModulePaintBrand::whereActiveStatus(1)->get();
            // $data['products'] = ModulePaintProducts::whereStatus(1)->orderby('created_at')->get();
            // $data['videos'] = ModuleVideoYoutube::whereCheckActive(1)->orderby('created_at', 'desc')->get();

        return view('guests.pages.home.index', $data);
    }

    public function redirect($slug) {
        if($slug == 'lien-he') {
            return view('guests.pages.contact');
        } 
        else if($slug == 'van-ban-dieu-hanh'){
            $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
            $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
            $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
            $data['table_html'] = $this->document_htmlTable('steering_documents');
            $data['type'] = 'steering_documents';
            return view('guests.pages.document.list', $data);
        }
        else if($slug == 'van-ban-quy-pham-phap-luat'){
            $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
            $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
            $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
            $data['table_html'] = $this->document_htmlTable('rules_of_law');
            $data['type'] = 'rules_of_law';
            return view('guests.pages.document.list', $data);
        }
        else if($slug == 'thu-vien-anh'){
            $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
            $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
            $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
            $data['library_images'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
            return view('guests.pages.libraryimages.list', $data);
        }
        else {
            $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
            $category = ModuleArticlesCategories::whereSlug($slug)->firstOrFail();
            if($category->display_method == 1){
                $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
                $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
                $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
                $data['article'] = ModuleArticles::whereCategoryId( $data['category']->id )
                                                    ->first();
                return view('guests.pages.post.only',$data);

            } else if($category->display_method == 2){
                $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
                $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
                $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
                $data['articles'] = ModuleArticles::whereCategoryId($category->id)->paginate(10);
                // $data['new_news'] = ModuleArticles::whereNewNews(1)->paginate(5);
                return view('guests.pages.post.list',$data);
            }
            abort('404'); 
        }
    }
    public function redirectDetail($slug, $slug1) {
        $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
        $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
        $data['category'] = ModuleArticlesCategories::whereSlug($slug)->firstOrFail();
        $data['article'] = ModuleArticles::whereCategoryId($data['category']->id)->whereSlug($slug1)->firstOrFail();
        $data['articles_relative'] = ModuleArticles::where('category_id', $data['article']->category_id)
                                                    ->orderBy('updated_at', 'desc')
                                                    ->get()
                                                    ->take(10);

        return view('guests.pages.post.detail', $data);
    }
    
    public function detailProduct ($slug) {
        $data['product'] = ModuleAgriculturalProducts::whereStatus(1)->where('slug',$slug)->firstOrFail();
        $data['sliders'] = PartialModuleAgriculturalProductImages::where('product_id', $data['product']->id)->get();;
        return view('guests.pages.product.detail', $data);
    }

    public function contactPost(Request $request){
        $rules = [
            'name' => 'required',
            'numberphone' => 'required',
            'content' => 'required',
            'captcha' => 'required|captcha'
        ];
        $msg = [
            'name.required' => 'Vui lòng nhập họ tên!',
            'numberphone.required' => 'Vui lòng nhập số điện thoại!',
            'content.required' => 'Vui lòng nhập nội dung!',
            'captcha.required' => 'Vui lòng nhập Mã bảo vệ',
            'captcha.captcha'  => 'Sai Mã bảo vệ'
        ];
        $validator = Validator::make($request->all(), $rules , $msg);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            try {
                $info = new ModuleContacts;
                $info->name = $request->input('name');
                $info->numberphone = $request->input('numberphone');
                $info->email = $request->input('email');
                $info->type = $request->input('type');
                $info->status = 0;
                $info->content = $request->input('content');
                $info->save();
                \Session::flash('flash_success','Cảm ơn bạn đã gửi liên hệ!');
                return redirect('/lien-he');
            } catch(Exception $e) {
                \Session::flash('flash_danger','Thất bại!');
                return redirect('/lien-he');
            }
        }
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
        $data['vertical_menus'] = ModuleArticlesCategories::whereStatus(1)->whereShowVMenu(1)->orderBy('display_v_order')->get();
        $data['image_libraries'] = DB::table('module_image_libraries')
                                        ->leftJoin('partial_module_library_images','module_image_libraries.id','=','partial_module_library_images.library_id')
                                        ->where('module_image_libraries.status','=',1)
                                        ->where('module_image_libraries.id','!=',1)
                                        ->select('module_image_libraries.*','partial_module_library_images.path')
                                        ->groupBy('module_image_libraries.id')
                                        ->get();
        $data['images'] = PartialModuleLibraryImages::whereLibraryId($id)->get(); // Hình trong thư viện ảnh được chọn

        return view('guests.pages.libraryimages.image', $data);
    }
}
