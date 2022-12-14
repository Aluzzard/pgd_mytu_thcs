<?php

namespace App\Http\Controllers\MainStructure\Users;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Models
use App\Models\MainStructure\AccountUsers;
use App\Models\MainStructure\SysFunctionPermissionsAccordingToUser;
//Controller
use App\Http\Controllers\MainStructure\Admins\LogsController;

class FunctionPermissionsAccordingToUser extends Controller {

	public function index(){
		if( CheckRoleByUser::checkRoleFunctionByUser('view', 3) == false ){
    		abort('404');
    	} else {
    		$accounts_users = $this->htmlDataTable();
			return view('mainstructure.pages.users.FunctionPermission.FunctionPermission',['html_table' => $accounts_users]);
    	}
	}
	//
	public function ajax(Request $request){
		if( CheckRoleByUser::checkRoleFunctionByUser('view', 3) == true ){
			$input = $request->input();
			if( $input['user_id'] != 1 ) { //Block edit user default
				if ( $input['action_type'] == 'view' ) {
					if( CheckRoleByUser::checkRoleFunctionByUser('view', 3) == true ){
						return $this->view( $input );
					} else {
						return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
					}
				}
				if ( $input['action_type'] == 'edit' ) {
					if( CheckRoleByUser::checkRoleFunctionByUser('edit', 3) == true ){
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
				if( CheckRoleByUser::checkRoleFunctionByUser('edit', 3) == true ){
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
			$permissions = SysFunctionPermissionsAccordingToUser::whereUserId( $input['user_id'] )->get();
			return response()->json(['error'=>false, 'list' => $permissions ]);
		} catch(Exception $e) {
			return response()->json(['error'=>true, 'message'=>'Lỗi phân quyền!']);
		}
	}

	public function edit($input){
		try {
			$user_id = $input['user_id'];
			$array_function_permissions = $input['array_function_permissions'];
			foreach($array_function_permissions as $function_permission){
				$permission = SysFunctionPermissionsAccordingToUser::whereUserId($user_id)
													->whereAction($function_permission['action'])
													->first();
				if($permission){
					$permission->function_permissions = $function_permission['function_permission'];
					$permission->update();
				} else {
					$permission = new SysFunctionPermissionsAccordingToUser;
					$permission->user_id = $user_id;
					$permission->function_permissions = $function_permission['function_permission'];
					$permission->action = $function_permission['action'];
					$permission->save();
				}
			}
			$accounts_users = AccountUsers::find($user_id);		
			LogsController::write("Phân quyền chức năng", "Sửa đổi", "Phân quyền tài khoản: ".$accounts_users->account);	
			return response()->json(['error'=>false, 'message' => 'Phân quyền thành công!']);
		} catch(Exception $e) {
			return response()->json(['error'=>true, 'message'=>'Lỗi phân quyền!']);
		}
	}
}
