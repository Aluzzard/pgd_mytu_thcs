<?php
namespace App\Http\Controllers\Modules\AIArticlesByPermission;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;
//Models
use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleArticleByMenu;
//Controllers
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleArticlesRequest;

class AIArticlesByPermissionController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
            $data['check_edit'] = CheckRoleByUser::checkRoleModuleByUser('edit');
    	    return view('modules.AIArticlesByPermission.index', $data);
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
    public function listArticles(Request $request) {
        try{
            $category_id = $request->input('category_id');
            $articles = ModuleArticles::where( 'category_id', $category_id )->orderby('status')->orderby('created_at', 'desc')->get();
            $table_html = $this->dataTable($articles, $category_id);
            $check_add = $this->permissionAction('add', $category_id);
            return response()->json(['error'=>false, 'table_html' => $table_html, 'check_add' => $check_add]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu thất bại!']);
        }
    }

    // Danh sách các modules
    public function dataTable($articles, $category_id){
        $check_edit = $this->permissionAction('edit', $category_id);
        $check_delete = $this->permissionAction('delete', $category_id);
        $html = '';
        if($articles){
            foreach ($articles as $article){
                $html .= '<tr>';
                if ($article->status == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                if ($article->new_news == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                if ($article->featured_news == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                $html .= '  <td><img src="'.$article->avatar.'" style="height:50px;"></td>';
                $html .= '  <td>'.$article->title.'</td>';
                $html .= '  <td>'.$article->created_at.'</td>';
                $html .= '  <td>'.$article->user->name.'</td>';      
                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true && $check_edit == true){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$article->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true && $check_delete == true){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$article->id.')">
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
            $article = ModuleArticles::find( $request->input('id') );
            return response()->json(['error'=>false, 'article'=>$article]);
        } catch(Exception $e) {
            return response()->json(['error'=>true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try{
            $validator = Validator::make($request->all(), ModuleArticlesRequest::rules($request->input('id')), ModuleArticlesRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $input['user_id'] = Auth::id();
                $input['created_at'] = ($request->input('created_at') ? $request->input('created_at') : new \Datetime);
                ModuleArticles::create($input);
                return response()->json(['error'=> false, 'message' => 'Thêm mới thành công', 'category_id' => $request->input('category_id')]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Thêm mới thất bại!']);
        }
    }
    public function edit($request){
        try{
            $validator = Validator::make($request->all(), ModuleArticlesRequest::rules($request->input('id')), ModuleArticlesRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $input['status'] = ($request->input('status') == 1 ? 1 : 0);
                $input['new_window'] = ($request->input('new_window') == 1 ? 1 : 0);
                $input['show_h_menu'] = ($request->input('show_h_menu') == 1 ? 1 : 0);
                $input['show_v_menu'] = ($request->input('show_v_menu') == 1 ? 1 : 0);
                $input['created_at'] = ($request->input('created_at') ? $request->input('created_at') : new \Datetime);
                $article = ModuleArticles::find( $request->input('id') );
                $article->update($input);
                return response()->json(['error'=>false, 'message'=>'Chỉnh sửa thành công!', 'category_id' => $request->input('category_id') ]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Chỉnh sửa thất bại!']);
        }
    }
    public function delete($request){
        try{
            $article = ModuleArticles::find($request->input('id'));
            $article->delete();
            return response()->json(['error'=>false, 'message'=>'Xoá thành công!', 'category_id' => $article->category_id]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']);
        }
    }
    public function permissionAction($action, $category_id){
        if( Auth::id() != 1) {
            $permission = ModuleArticleByMenu::whereUserId( Auth::id() )->whereAction($action)->first();
            if($permission){
                $array_permission = explode(",", $permission->module_permissions );
                if( in_array($category_id, $array_permission)){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
            
        } else {
            return true;
        }
        
    }
}
