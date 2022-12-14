<?php
namespace App\Http\Controllers\Modules\AIArticlesCategory;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
//Models
use App\Models\Modules\ModuleArticlesCategories;
use App\Models\Modules\ModuleArticles;
use App\Models\Modules\ModuleArticleByMenu;
//Controllers
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleArticlesCategoryRequest;

class AIArticlesCategoryController extends Controller {

    public function index() {
    	if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
        	$data['tree'] = $this->treeView();
        	$data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
        	$data['check_edit'] = CheckRoleByUser::checkRoleModuleByUser('edit');
        	$data['check_delete'] = CheckRoleByUser::checkRoleModuleByUser('delete');
    		return view('modules.AIArticlesCategory.index', $data);
    	}
    }
    // Func tree parent
    public function treeViewByPermission(){
        $permission = ModuleArticleByMenu::whereUserId(Auth::id())->whereAction('view')->firstOrFail();
        $array_permission = explode(",", $permission->module_permissions );
        $data_categories = ModuleArticlesCategories::where('id_parent', '=', '0')->whereIn('id',$array_permission)->get();

        $tree='<ul>';
        foreach ($data_categories as $data_categories) {
            $tree .='<li id="node_'.$data_categories->id.'" class="jstree-open '.($data_categories->status==0?'text-danger':'').'">'.$data_categories->name;
            if(count($data_categories->childs)) {
                $tree .= $this->childViewByPermission($data_categories);
            }
        }
        $tree .='<ul>';
        return $tree;
    } // Func tree parent
    // Func tree child
    public function childViewByPermission($data_categories){   
        $permission = ModuleArticleByMenu::whereUserId(Auth::id())->whereAction('view')->firstOrFail();
        $array_permission = explode(",", $permission->module_permissions );              
        $html ='<ul>';
        foreach ($data_categories->childs->whereIn('id',$array_permission)->sortBy('display_h_order') as $arr) {
            if (count($arr->childs)){
                $html .='<li id="node_'.$arr->id.'" class="jstree-open '.($arr->status==0?'text-danger':'').'">'.$arr->name;                  
                $html.= $this->childView($arr);
            } else {
                $html .='<li id="node_'.$arr->id.'" class="'.($arr->status==0?'text-danger':'').'">'.$arr->name;                                 
                $html .="</li>";
            }           
        }
        $html .="</ul>";
        return $html;
    } // Func tree child

    // Func tree parent
    public function treeView(){
    	$data_categories = ModuleArticlesCategories::where('id_parent', '=', '0')->orderBy('display_h_order')->get();
		$tree='<ul>';
        foreach ($data_categories as $data_categories) {
            $tree .='<li id="node_'.$data_categories->id.'" class="jstree-open '.($data_categories->status==0?'text-danger':'').'">'.$data_categories->name;
            if(count($data_categories->childs)) {
                $tree .= $this->childView($data_categories);
            }
        }
        $tree .='<ul>';
        return $tree;
    } // Func tree parent

    // Func tree child
    public function childView($data_categories){                 
        $html ='<ul>';
        foreach ($data_categories->childs->sortBy('display_h_order') as $arr) {
            if (count($arr->childs)){
            	$html .='<li id="node_'.$arr->id.'" class="jstree-open '.($arr->status==0?'text-danger':'').'">'.$arr->name;                  
                $html.= $this->childView($arr);
            } else {
                $html .='<li id="node_'.$arr->id.'" class="'.($arr->status==0?'text-danger':'').'">'.$arr->name;                                 
                $html .="</li>";
            }           
        }
        $html .="</ul>";
        return $html;
    } // Func tree child


    public function ajax(Request $request){
    	if(CheckRoleByUser::checkRoleModuleByUser('view') == true || CheckRoleByUser::checkRoleFunctionByUser('view',1) == true){
	    	$action_type = $request->input('action_type');
            if($action_type == 'treeviewbypermission' ){
                try {
                    if(Auth::id() == 1){
                        $tree = $this->treeView();
                        return response()->json(['error'=> false, 'tree' => $tree]);
                    } else {
                        $tree = $this->treeViewByPermission();
                        return response()->json(['error'=> false, 'tree' => $tree]);
                    }
                } catch (Exception $e) {
                     return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
                }
            }
	    	if($action_type == 'treeview' ){
	    		try {
	    			$tree = $this->treeView();
		            return response()->json(['error'=> false, 'tree' => $tree]);
		        } catch (Exception $e) {
		             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
		        }
	    	}
	    	else if ($action_type == 'view' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('view') == true ){
                    return $this->view($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
                }
        	}
        	else if ($action_type == 'changeParent' ) {
	    		if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                    return $this->changeParent($request);
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
    public function view($request){
       	try {
            $category = ModuleArticlesCategories::find( $request->input('id') );
            return response()->json(['error'=> false, 'category'=>$category]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
			$validator = Validator::make($request->all(), ModuleArticlesCategoryRequest::rules($request->input('id')), ModuleArticlesCategoryRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
    			$input = $request->all();
                ModuleArticlesCategories::create($input);
                $tree = $this->treeView();
	            return response()->json(['error'=> false, 'message' => 'Thêm chuyên mục thành công', 'tree' => $tree]);
	        }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm chuyên mục thất bại']);
        }
    }
    public function edit($request){
        try {
			$validator = Validator::make($request->all(), ModuleArticlesCategoryRequest::rules($request->input('id')), ModuleArticlesCategoryRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
	            $input = $request->all();
                $input['status'] = ($request->input('status') == 1 ? 1 : 0);
                $input['new_window'] = ($request->input('new_window') == 1 ? 1 : 0);
                $input['show_h_menu'] = ($request->input('show_h_menu') == 1 ? 1 : 0);
                $input['show_v_menu'] = ($request->input('show_v_menu') == 1 ? 1 : 0);
                $category = ModuleArticlesCategories::find( $request->input('id') );
                $category->update($input);
                $tree = $this->treeView();
                return response()->json(['error'=> false, 'message' => 'Sửa chuyên mục thành công', 'tree' => $tree]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Sửa chuyên mục thất bại']);
        }
    }
    public function delete($request){
        try {
			$id = $request->input('id');
            $category = ModuleArticlesCategories::where('id_parent', $id)->get();
	            if ( count($category) > 0 ) return response()->json(['error'=> true, 'message' => 'Chuyên mục chứa chuyên mục con']);
	            $posts = ModuleArticles::where('category_id', $id)->get();
	            if ( count($posts) > 0 ) return response()->json(['error'=> true, 'message' => 'Chuyên mục chứa bài viết']);
            $category = ModuleArticlesCategories::find( $id );
            $category->delete();

            $tree = $this->treeView();
            return response()->json(['error'=> false, 'message' => 'Xóa chuyên mục thành công', 'tree' => $tree]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa chuyên mục thất bại']);
        }
    }
    public function changeParent($request){
       	try {
			$id = substr( $request->input('id'), 5 );
			$id_parent = substr( $request->input('parent'), 5 );
            $category = ModuleArticlesCategories::find( $id );
            
            $request->input('parent') == '#' ? $category->id_parent = 0 : $category->id_parent = $id_parent;
         
            $category->update();
            $tree = $this->treeView();
            return response()->json(['error'=> false, 'message' => 'Thay đổi vị trí chuyên mục thành công!', 'tree' => $tree]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Thay đổi vị trí chuyên mục thất bại!']);
        }
    }
}
