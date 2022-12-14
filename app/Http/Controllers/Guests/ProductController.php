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
use App\Models\Modules\ModuleWebsiteLinks;
use App\Models\Modules\ModuleImageLibraries;
use App\Models\Modules\PartialModuleLibraryImages;
use App\Models\Modules\ModulePaintBrand;
use App\Models\Modules\ModulePaintProduct;
use App\Models\Modules\ModuleVideoYoutube;
//Controllers

class PageController extends Controller {

    public function index(){
        $data['sliders'] = PartialModuleLibraryImages::whereLibraryId(1)->get();
        $data['articles'] = ModuleArticles::whereStatus(1)->where('category_id',8)->orderby('created_at', 'desc')->get();
        $data['links'] = ModuleWebsiteLinks::where('status',1)->get();
        $data['enterprises'] = ModulePaintBrand::whereActiveStatus(1)->get();
        $data['products'] = ModulePaintProduct::whereStatus(1)->orderby('created_at')->get();
        $data['videos'] = ModuleVideoYoutube::whereCheckActive(1)->orderby('created_at', 'desc')->get();

        return view('guests.pages.home.index', $data);
    }

    public function redirect($slug) {
        if($slug == 'san-pham') {
            return view('guests.pages.product.list');
        }
        else if($slug == 'lien-he') {
            return view('guests.pages.contact');
        } 
        else {
            $category = ModuleArticlesCategories::whereSlug($slug)->firstOrFail();
            if($category->display_method == 1){
                $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
                $data['article'] = ModuleArticles::whereCategoryId( $data['category']->id )
                                                    ->first();
                return view('guests.pages.post.only',$data);
            } else if($category->display_method == 2){
                $data['category'] = ModuleArticlesCategories::whereSlug($slug)->first();
                $data['articles'] = ModuleArticles::whereCategoryId($category->id)->paginate(10);
                $data['new_news'] = ModuleArticles::whereNewNews(1)->paginate(5);
                return view('guests.pages.post.list',$data);
            }
            abort('404'); 
        }
    }
    public function detailArticle($slug) {
        $data['article'] = ModuleArticles::where('slug',$slug)->first();
        $data['articles_relative'] = ModuleArticles::where('category_id', $data['article']->category_id)->orderBy('updated_at', 'desc')->get();
        return view('guests.pages.post.detail', $data);
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
        if($validator->fails()){
            return response()->json(['error' => true, 'validate' => false, 'message' => $validator->getMessageBag()->toArray()]);
        } else {
            try {
                $info = new ModuleContacts;
                $info->name = $request->input('name');
                $info->numberphone = $request->input('numberphone');
                $info->email = $request->input('email');
                $info->status = 0;
                $info->content = $request->input('content');
                $info->save();
                return response()->json(['error'=>false, 'message'=>'Cảm ơn bạn đã gửi liên hệ!']);
            } catch(Exception $e) {
                return response()->json(['error'=>true, 'message'=>'Thất bại!']);
            }
        }
    }
}
