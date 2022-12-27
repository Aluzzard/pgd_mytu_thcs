<?php

namespace App\Http\Controllers\Modules\AIVideoYoutube;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\Modules\PartialModuleVideoYoutubeCategories;
use App\Models\Modules\ModuleVideoYoutube;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleVideoYoutubeRequest;

class AIVideoYoutubeController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['table_html'] = $this->dataTable();
            $data['categories'] = PartialModuleVideoYoutubeCategories::all();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
            return view('modules.AIVideoYoutube.index', $data);
        }
    }

    public function ajax(Request $request){
        if(CheckRoleByUser::checkRoleModuleByUser('view') == true || CheckRoleByUser::checkRoleFunctionByUser('view',1) == true){
            $action_type = $request->input('action_type');
            if ($action_type == 'view' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('view') == true ){
                    return $this->view($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
                }
            }
            else if($action_type == 'add' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('add') == true ){
                    return $this->add($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
                }
            }
            else if( $action_type == 'edit' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                    return $this->edit($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
                }
            }
            else if($action_type == 'delete' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                    return $this->delete($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
                }
            }
        } else {
            abort('404');
        }
    }
    
    public function dataTable(){
        $videos = ModuleVideoYoutube::orderBy('check_active')->orderBy('created_at','desc')->get();
        $html = '';
        if($videos){
            foreach ($videos as $video){
                $html .= '<tr>';

                if ($video->check_active == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                if ($video->check_outstanding == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                $html .= '  <td>'.$video->name.'</td>';
                $html .= '  <td><a href="https://www.youtube.com/watch?v='.$video->link.'" target="_blank">https://www.youtube.com/watch?v='.$video->link.'</a></td>';
                $html .= '  <td>'.$video->content.'</td>';
                $html .= '  <td>'.$video->created_at.'</td>';
                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalVideo" onclick="func_buttonClick(`edit`,'.$video->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$video->id.')">
                                    <i class="fa fa-times"></i><span class="ml-2">Xóa</span>
                                </button>';
                }
                $html .= '  </td>';                     
                $html .= '</tr>';
            }
        }
        return $html;
    }
    public function view($request){
        try {
            $video = ModuleVideoYoutube::find( $request->input('id') );
            return response()->json(['error'=> false, 'video'=>$video]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
            $validator = Validator::make($request->all(), ModuleVideoYoutubeRequest::rules($request->input('id')), ModuleVideoYoutubeRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                if( substr($input['link'],0, 32) == 'https://www.youtube.com/watch?v=') {
                    $input['link'] = substr($input['link'],32, 43);
                } else if ( substr($input['link'],0, 17) == 'https://youtu.be/'){
                    $input['link'] = substr($input['link'],17, 28);
                } else if ( substr($input['link'],0, 30) == 'https://www.youtube.com/embed/'){
                    $input['link'] = substr($input['link'],32, 43);
                } else {
                    return response()->json(['error'=> true, 'message' => 'Đường link liên kết không đúng định dạng!']);
                }
                ModuleVideoYoutube::create($input);
                $html = $this->dataTable();
                LogsController::write("Video Youtube", "Thêm", "Tên Video: ".$input["name"]);
                return response()->json(['error'=> false, 'message' => 'Thêm video thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm video thất bại']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleVideoYoutubeRequest::rules($request->input('id')), ModuleVideoYoutubeRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                if( substr($input['link'],0, 32) == 'https://www.youtube.com/watch?v=') {
                    $input['link'] = substr($input['link'],32, 43);
                } else if ( substr($input['link'],0, 17) == 'https://youtu.be/'){
                    $input['link'] = substr($input['link'],17, 28);
                } else if ( substr($input['link'],0, 30) == 'https://www.youtube.com/embed/'){
                    $input['link'] = substr($input['link'],32, 43);
                } else {
                    return response()->json(['error'=> true, 'message' => 'Đường link liên kết không đúng định dạng!']);
                }
                $video = ModuleVideoYoutube::find( $request->input('id') );
                $video_old = $video->name;
                $video->update($input);
                $html = $this->dataTable();
                LogsController::write("Video Youtube", "Sửa", "Tên Video: ".$video_old.' thành '.$input["name"]);
                return response()->json(['error'=> false, 'message' => 'Sửa video thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Sửa video thất bại']);
        }
    }
    public function delete($request){
        try {
            $video = ModuleVideoYoutube::find( $request->input('id') );
            $video->delete();

            $html = $this->dataTable();
            LogsController::write("Video Youtube", "Xoá", "Tên Video: ".$video->name);
            return response()->json(['error'=> false, 'message' => 'Xóa video thành công', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa video thất bại']);
        }
    }

//-------------------------------------------------------------------------------------------
// Category ---------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

    public function ajaxCategory(Request $request){
        $action_type = $request->input('action_type');
        if ($action_type == 'listCategory' ) {
            return $this->listCategory($request);
        }
        else if($action_type == 'addCategory' ) {
            return $this->addCategory($request);
        }
        else if( $action_type == 'viewCategory' ) {
            return $this->viewCategory($request);
        }
        else if( $action_type == 'editCategory' ) {
            return $this->editCategory($request);
        }
        else if($action_type == 'deleteCategory' ) {
            return $this->deleteCategory($request);
        }
    }
    //Data function module
    public function htmlCategory(){
        $html = '';
        $categories = PartialModuleVideoYoutubeCategories::orderBy('sort')->get();
        if($categories){
            foreach ($categories as $category){
                $html .= '<tr onclick="func_buttonModalCategoryClick(`editCategory`,'.$category->id.')">';
                $html .= '  <td>'.$category->name.'</td>';
                $html .= '  <td>'.$category->sort.'</td>';
                $html .= '  <td>';
                $html .= '          <button type="button" class="btn btn-custon-four btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonModalCategoryClick(`deleteCategory`,'.$category->id.')">
                                        <i class="fa big-icon fa-times"></i><span class="ml-2">Xóa</span>
                                    </button>';
                $html .= '  </td>';
                $html .= '</tr>';
            }
        }
        return $html;
    }
    public function listCategory($request){
        try {
            $html_category = $this->htmlCategory();
            return response()->json(['error'=>false, 'message'=>'Lấy dữ liệu thành công!', 'html_category' => $html_category]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu thất bại!']); 
        }
    }
    public function viewCategory($request){
        try {
            $category = PartialModuleVideoYoutubeCategories::find( $request->input('id') );
            return response()->json(['error'=>false, 'message'=>'Lấy dữ liệu thành công!', 'category' => $category]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu thất bại!']); 
        }
    }
    public function addCategory($request){
        try {
            $input = $request->all();
            PartialModuleVideoYoutubeCategories::create( $input );
            $html_category = $this->htmlCategory();
            LogsController::write("Chủ đề video youtube", "Thêm", "Tên chủ đề: ".$input['name']);
            return response()->json(['error'=>false, 'message'=>'Thêm mới thành công!', 'html_category' => $html_category]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Thêm mới thất bại!']); 
        }
    }
    public function editCategory($request){
        try {
            $input = $request->all();
            $category = PartialModuleVideoYoutubeCategories::find( $request->input('id') );
            $category_old = $category;
            $category->update($input);
            $html_category = $this->htmlCategory();
            LogsController::write("Chủ đề video youtube", "Sửa", "Tên chủ đề: ".$category_old.' thành '.$category->name);
            return response()->json(['error'=>false, 'message'=>'Cập nhật thành công!', 'html_category' => $html_category]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Cập nhật thất bại!']); 
        }
    }
    public function deleteCategory($request){
        try {
            $input = $request->all();
            $category_id = $request->input('id');
            $videos = ModuleVideoYoutube::where('category_id', $category_id)->get();
            if( count($videos)>0 ) {
                return response()->json(['error'=> true, 'message' => 'Chủ đề có chứa video! Xoá video trước']);
            } else {
                $category = PartialModuleVideoYoutubeCategories::find( $request->input('id') );
                $category->delete();
                LogsController::write("Chủ đề video youtube", "Xoá", "Tên video youtube: ".$category->name);
                $html_category = $this->htmlCategory();
                return response()->json(['error'=> false, 'message' => 'Xoá thành công', 'html_category'=>$html_category]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']); 
        }
    }
}
