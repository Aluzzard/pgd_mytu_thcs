<?php

namespace App\Http\Controllers\MainStructure\Users;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
//Models
use App\Models\MainStructure\SysGroupModules;
use App\Models\MainStructure\SysListModules;
use App\Models\MainStructure\SysModulePermissionsAccordingToUser;
use App\Models\MainStructure\SysLogs;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class UsersModuleController extends Controller {
	public function listModule(){
		if(CheckRoleByUser::checkRoleFunctionByUser('view', 1) == false){
    		abort('404');
    	} else {
    		$user_id = Auth::guard('user')->id();
    		if($user_id == 1) {
    			$data['list_modules'] = SysListModules::whereActive('1')
												->with("by_group")
												->get()
												->sortBy('by_group.order')
												->groupBy('by_group.name');
				return view('mainstructure.pages.users.ListModule.ListModule', $data);
    		} else {
    			$permission = SysModulePermissionsAccordingToUser::whereUserId($user_id)->first();
				if($permission){
					$array_permission = explode(",", $permission->module_permissions );
					$data['list_modules'] = SysListModules::whereActive('1')
												->whereIn("id", $array_permission)
												->with("by_group")
												->get()
												->sortBy('by_group.order')
												->groupBy('by_group.name');
				} else {
					$data['list_modules'] = [];
				}
				return view('mainstructure.pages.users.ListModule.ListModule', $data);
    		}
			
    	}
	}
}
