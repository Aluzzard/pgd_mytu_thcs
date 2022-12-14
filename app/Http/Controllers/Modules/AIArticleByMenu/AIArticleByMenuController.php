<?php

namespace App\Http\Controllers\Modules\AIArticleByMenu;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Models
use App\Models\MainStructure\AccountUsers;
use App\Models\Modules\ModuleArticlesCategories;
use App\Models\Modules\ModuleArticleByMenu;
//Controller
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class AIArticleByMenuController extends Controller {

	public function index(){
		if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
        	$data['table_html'] = $this->htmlDataTable();
            $data['article_categories'] = ModuleArticlesCategories::all();
        	return view('modules.AIArticleByMenu.index', $data);
        }
	}
	//
	public function ajax(Request $request){
		if( CheckRoleByUser::checkRoleFunctionByUser('view', 4) == true ){
			$input = $request->input();
			if( $input['user_id'] != 1 ) { //Block edit user default
				if ( $input['action_type'] == 'view' ) {
					if( CheckRoleByUser::checkRoleFunctionByUser('view', 4) == true ){
						return $this->view( $input );
					} else {
						return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
					}
				}
				if ( $input['action_type'] == 'edit' ) {
					if( CheckRoleByUser::checkRoleFunctionByUser('edit', 4) == true ){
						return $this->edit( $input );
					} else {
						return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
					}
				}
			}
		}
	}
	public function htmlDataTable(){
		$accounts_users = AccountUsers::whereActive('1')->where('id', '!=', 1)->where('id', '!=', Auth::id())->orderby('active', 'desc')->get();
		$html = '';
		if($accounts_users){
			foreach($accounts_users as $account_users ){
				$html .= '<tr>';
				$html .= '	<td>'.$account_users->account.'</td>';
				$html .= '	<td>'.$account_users->name.'</td>';
				$html .= '	<td>';
				if( CheckRoleByUser::checkRoleFunctionByUser('edit', 4) == true ){
					$html .= '			<button type="button" class="btn btn-sm btn-custon-four btn-info" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$account_users->id.')">
										<i class="fa big-icon fa-shield"></i><span class="ml-2">Phân quyền</span>
									</button>';
				}
				$html .= '	</td>';
				$html .= '</tr>';
			}
		}
		return $html;
	}

	public function view($input){
		try {
			$permissions = ModuleArticleByMenu::whereUserId( $input['user_id'] )->get();
			return response()->json(['error'=>false, 'list' => $permissions ]);
		} catch(Exception $e) {
			return response()->json(['error'=>true, 'message'=>'Lỗi phân quyền!']);
		}
	}

	public function edit($input){
		try {
			$user_id = $input['user_id'];
			$array_module_permissions = $input['array_module_permissions'];
			foreach($array_module_permissions as $module_permission){
				$permission = ModuleArticleByMenu::whereUserId($user_id)
													->whereAction($module_permission['action'])
													->first();
				if($permission){
					$permission->module_permissions = $module_permission['module_permission'];
					$permission->update();
				} else {
					$permission = new ModuleArticleByMenu;
					$permission->user_id = $user_id;
					$permission->module_permissions = $module_permission['module_permission'];
					$permission->action = $module_permission['action'];
					$permission->save();
				}
			}
			$accounts_users = AccountUsers::find($user_id);
			LogsController::write("AIArticleByMenu", "Sửa đổi", "Phân quyền tài khoản: ".$accounts_users->account);
			return response()->json(['error'=>false, 'message' => 'Phân quyền thành công!']);
		} catch(Exception $e) {
			return response()->json(['error'=>true, 'message'=>'Lỗi phân quyền!']);
		}
	}
//End nhóm các modules
}
