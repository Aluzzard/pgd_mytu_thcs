<?php

namespace App\Http\Controllers\Modules\AIAdvertisement;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\Modules\ModuleAdvertisement;
//Requests
use App\Http\Requests\Module\ModuleAdvertisementRequest;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class AIAdvertisementController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
            return view('modules.AIAdvertisement.index', $data);
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
        $advertisements = ModuleAdvertisement::orderBy('is_active')->orderBy('created_at','desc')->get();
        $html = '';
        if($advertisements){
            foreach ($advertisements as $advertisement){
                $html .= '<tr>';
                if ($advertisement->is_active == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                $html .= '  <td>'.$advertisement->name.'</td>';
                $html .= '  <td>'.$advertisement->show_from_date.'</td>';
                $html .= '  <td>'.$advertisement->show_to_date.'</td>';
                $html .= '  <td>'.$advertisement->created_at.'</td>';
                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$advertisement->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$advertisement->id.')">
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
            $advertisement = ModuleAdvertisement::find( $request->input('id') );
            return response()->json(['error'=> false, 'advertisement'=>$advertisement]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
            $validator = Validator::make($request->all(), ModuleAdvertisementRequest::rules($request->input('id')), ModuleAdvertisementRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                ModuleAdvertisement::create($input);
                $html = $this->dataTable();
                LogsController::write("AIAdvertisement", "Thêm", "Quảng cáo: ".$input["name"]);
                return response()->json(['error'=> false, 'message' => 'Thêm quảng cáo thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm quảng cáo thất bại']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleAdvertisementRequest::rules($request->input('id')), ModuleAdvertisementRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $advertisement = ModuleAdvertisement::find( $request->input('id') );
                $advertisement->update($input);
                $html = $this->dataTable();
                LogsController::write("AIAdvertisement", "Sửa", "Quảng cáo: ".$input["name"]);
                return response()->json(['error'=> false, 'message' => 'Sửa quảng cáo thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Sửa quảng cáo thất bại']);
        }
    }
    public function delete($request){
        try {
            $advertisement_id = $request->input('id');
            $advertisement = ModuleAdvertisement::find( $advertisement_id );
            $advertisement->delete();
            LogsController::write("AIAdvertisement", "Xoá", "Quảng cáo: ".$advertisement->name);
            
            $html = $this->dataTable();
            return response()->json(['error'=> false, 'message' => 'Xóa quảng cáo thành công', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa quảng cáo thất bại']);
        }
    }
}
