<?php

namespace App\Http\Controllers\Modules\AIRulesOfLaw;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
//Models
use App\Models\Modules\ModuleRulesOfLaw;
use App\Models\Modules\PartialModuleRulesOfLawByField;
use App\Models\Modules\PartialModuleRulesOfLawByOrganizations;
use App\Models\Modules\PartialModuleRulesOfLawByType;
//Requests
use App\Http\Requests\Module\ModuleRulesOfLawRequest;
use App\Http\Requests\Module\PartialModuleRulesOfLawByFieldRequest;
use App\Http\Requests\Module\PartialModuleRulesOfLawByOrganizationsRequest;
use App\Http\Requests\Module\PartialModuleRulesOfLawByTypeRequest;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class AIRulesOfLawController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['fields'] = PartialModuleRulesOfLawByField::all();
            $data['types'] = PartialModuleRulesOfLawByType::all();
            $data['organizations'] = PartialModuleRulesOfLawByOrganizations::all();
        	$data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
        	return view('modules.AIRulesOfLaw.index', $data);
        }
    }

    public function ajaxDocument(Request $request){
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
    	$documents = ModuleRulesOfLaw::orderBy('date_issue','desc')->get();
        $html = '';
        if($documents){
            foreach ($documents as $key=>$document){
                $html .= '<tr>';
                $html .= '  <td>'.($key+1).'</td>';
                $html .= '  <td>'.$document->number.'</td>';
                $html .= '  <td>'.$document->content.'</td>';
                $html .= '  <td>'.$document->date_issue.'</td>';
                $html .= '  <td>'.$document->date_effect.'</td>';
                $html .= '  <td>'.$document->type->name.'</td>';
                $html .= '  <td>'.$document->organization->name.'</td>';
                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$document->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$document->id.')">
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
            $document = ModuleRulesOfLaw::find( $request->input('id') );
            return response()->json(['error'=> false, 'document'=>$document]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
            $validator = Validator::make($request->all(), ModuleRulesOfLawRequest::rules($request->input('id')), ModuleRulesOfLawRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();

                $file = $request->file('file');
                $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                $file_name = $file->getClientOriginalName();
                $random_file_name = Str::random(4).'_'.$file_name;
                while(file_exists(public_path().'/upload/document/steeringdocument/'.$random_file_name)){
                    $random_file_name = Str::random(4).'_'.$file_name;
                }
                $file->move(public_path().'/upload/document/steeringdocument',$random_file_name);
                $input['file'] = $file_name;
                $input['file_path'] = '/upload/document/steeringdocument/'.$random_file_name;

                ModuleRulesOfLaw::create($input);
                $html = $this->dataTable();
                LogsController::write("AIRulesOfLaw", "Thêm", "Văn bản: ".$input["number"]);
                return response()->json(['error'=> false, 'message' => 'Thêm văn bản thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm văn bản thất bại']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleRulesOfLawRequest::rules2($request->input('id')), ModuleRulesOfLawRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $document = ModuleRulesOfLaw::find( $request->input('id') );

                if($request->hasFile('file')){
                    if($document->file_path != ''){
                        unlink(public_path().$document->file_path);
                    }
                    $file = $request->file('file');
                    $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                    $file_name = $file->getClientOriginalName();
                    $random_file_name = Str::random(4).'_'.$file_name;
                    while(file_exists(public_path().'/upload/document/steeringdocument/'.$random_file_name)){
                        $random_file_name = Str::random(4).'_'.$file_name;
                    }
                    $file->move(public_path().'/upload/document/steeringdocument',$file_name);
                    $input['file'] = $file_name;
                    $input['file_path'] = '/upload/document/steeringdocument/'.$file_name;
                }
                $document->update($input);
                $html = $this->dataTable();
                LogsController::write("AIRulesOfLaw", "Sửa", "Văn bản: ".$input["number"]);
                return response()->json(['error'=> false, 'message' => 'Sửa văn bản thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Sửa văn bản thất bại']);
        }
    }
    public function delete($request){
        try {
            $document = ModuleRulesOfLaw::find( $request->input('id') );
            unlink(public_path().$document->file_path);
            $document->delete();
            $html = $this->dataTable();
            LogsController::write("AIRulesOfLaw", "Xoá", "Văn bản: ".$document->number);
            return response()->json(['error'=> false, 'message' => 'Xóa văn bản thành công', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa văn bản thất bại']);
        }
    }


//-------------------------------------------------------------------------------------------
// Partial ---------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

    public function ajaxPartial(Request $request){
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
    public function dataTableCategory($datas){
        $html = '';
        if($datas){
            foreach ($datas as $data){
                $html .= '<tr onclick="func_buttonModalCategoryClick(`editCategory`,'.$data->id.')">';
                $html .= '  <td>'.$data->name.'</td>';
                $html .= '  <td>';
                $html .= '          <button type="button" class="btn btn-custon-four btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonModalCategoryClick(`deleteCategory`,'.$data->id.')">
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
            if($request->input('type') == 'field'){
                $data = PartialModuleRulesOfLawByField::all();
            } else if($request->input('type') == 'type'){
                $data = PartialModuleRulesOfLawByType::all();
            } else if($request->input('type') == 'organization'){
                $data = PartialModuleRulesOfLawByOrganizations::all();
            }     
            $html_table = $this->dataTableCategory($data);
            return response()->json(['error'=>false, 'message'=>'Lấy dữ liệu thành công!', 'html_table' => $html_table]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu thất bại!']); 
        }
    }
    public function viewCategory($request){
        try {
            if($request->input('type') == 'field'){
                $data = PartialModuleRulesOfLawByField::find( $request->input('id') );
            } else if($request->input('type') == 'type'){
                $data = PartialModuleRulesOfLawByType::find( $request->input('id') );
            } else if($request->input('type') == 'organization'){
                $data = PartialModuleRulesOfLawByOrganizations::find( $request->input('id') );
            }  
            return response()->json(['error'=>false, 'message'=>'Lấy dữ liệu thành công!', 'data' => $data]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu thất bại!']); 
        }
    }
    public function addCategory($request){
        try {
            $input = $request->input();
            if($request->input('type') == 'field'){
                $validator = Validator::make($request->all(), PartialModuleRulesOfLawByFieldRequest::rules($request->input('id')), PartialModuleRulesOfLawByFieldRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    PartialModuleRulesOfLawByField::create($input);
                    LogsController::write("AIRulesOfLaw", "Thêm", "Lĩnh vực: ".$request->input('name'));
                }
            } else if($request->input('type') == 'type'){
                $validator = Validator::make($request->all(), PartialModuleRulesOfLawByTypeRequest::rules($request->input('id')), PartialModuleRulesOfLawByTypeRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    PartialModuleRulesOfLawByType::create($input);
                    LogsController::write("AIRulesOfLaw", "Thêm", "Loại: ".$request->input('name'));
                }
            } else if($request->input('type') == 'organization'){
                $validator = Validator::make($request->all(), PartialModuleRulesOfLawByOrganizationsRequest::rules($request->input('id')), PartialModuleRulesOfLawByOrganizationsRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    PartialModuleRulesOfLawByOrganizations::create($input);
                    LogsController::write("AIRulesOfLaw", "Thêm", "Cơ quan ban hành: ".$request->input('name'));
                }
            } 
            if($request->input('type') == 'field'){
                $data1 = PartialModuleRulesOfLawByField::all();
            } else if($request->input('type') == 'type'){
                $data1 = PartialModuleRulesOfLawByType::all();
            } else if($request->input('type') == 'organization'){
                $data1 = PartialModuleRulesOfLawByOrganizations::all();
            } 
            $html_table = $this->dataTableCategory($data1);
            return response()->json(['error'=>false, 'message'=>'Thêm mới thành công!', 'html_table' => $html_table]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Thêm mới thất bại!']); 
        }
    }
    public function editCategory($request){
        try {
            $input = $request->input();
            if($request->input('type') == 'field'){
                $validator = Validator::make($request->all(), PartialModuleRulesOfLawByFieldRequest::rules($request->input('id')), PartialModuleRulesOfLawByFieldRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    $data = PartialModuleRulesOfLawByField::find( $request->input('id') );
                    $data->update($input);
                    LogsController::write("AIRulesOfLaw", "Sửa", "Lĩnh vực: ".$request->input('name'));
                }
            } else if($request->input('type') == 'type'){
                $validator = Validator::make($request->all(), PartialModuleRulesOfLawByTypeRequest::rules($request->input('id')), PartialModuleRulesOfLawByTypeRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    $data = PartialModuleRulesOfLawByType::find( $request->input('id') );
                    $data->update($input);
                    LogsController::write("AIRulesOfLaw", "Sửa", "Loại: ".$request->input('name'));
                }
            } else if($request->input('type') == 'organization'){
                $validator = Validator::make($request->all(), PartialModuleRulesOfLawByOrganizationsRequest::rules($request->input('id')), PartialModuleRulesOfLawByOrganizationsRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    $data = PartialModuleRulesOfLawByOrganizations::find( $request->input('id') );
                    $data->update($input);
                    LogsController::write("AIRulesOfLaw", "Sửa", "Cơ quan ban hành: ".$request->input('name'));
                }
            }  
            if($request->input('type') == 'field'){
                $data1 = PartialModuleRulesOfLawByField::all();
            } else if($request->input('type') == 'type'){
                $data1 = PartialModuleRulesOfLawByType::all();
            } else if($request->input('type') == 'organization'){
                $data1 = PartialModuleRulesOfLawByOrganizations::all();
            } 
            $html_table = $this->dataTableCategory($data1);
            return response()->json(['error'=>false, 'message'=>'Sửa đổi thành công!', 'html_table' => $html_table]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Cập nhật thất bại!']); 
        }
    }
    public function deleteCategory($request){
        try {
            if($request->input('type') == 'field'){
                $datas = ModuleRulesOfLaw::whereFieldId( $request->input('id') )->get();
            } else if($request->input('type') == 'type'){
                $datas = ModuleRulesOfLaw::whereTypeId( $request->input('id') )->get();
            } else if($request->input('type') == 'organization'){
                $datas = ModuleRulesOfLaw::whereOrganizationId( $request->input('id') )->get();
            }  
            if(count($datas)>0){
                return response()->json(['error'=>true, 'message'=>'Xoá thất bại! Tồn tại văn bản đang sử dụng!']); 
            } else {
                if($request->input('type') == 'field'){
                    $data = PartialModuleRulesOfLawByField::find( $request->input('id') );
                    $data->delete();
                    LogsController::write("AIRulesOfLaw", "Xoá", "Lĩnh vực: ".$request->input('name'));
                } else if($request->input('type') == 'type'){
                    $data = PartialModuleRulesOfLawByType::find( $request->input('id') );
                    $data->delete();
                    LogsController::write("AIRulesOfLaw", "Xoá", "Loại: ".$request->input('name'));
                } else if($request->input('type') == 'organization'){
                    $data = PartialModuleRulesOfLawByOrganizations::find( $request->input('id') );
                    $data->delete();
                    LogsController::write("AIRulesOfLaw", "Xoá", "Cơ quan ban hành: ".$request->input('name'));
                }  
                if($request->input('type') == 'field'){
                    $data1 = PartialModuleRulesOfLawByField::all();
                } else if($request->input('type') == 'type'){
                    $data1 = PartialModuleRulesOfLawByType::all();
                } else if($request->input('type') == 'organization'){
                    $data1 = PartialModuleRulesOfLawByOrganizations::all();
                } 
                $html_table = $this->dataTableCategory($data1);
                return response()->json(['error'=>false, 'message'=>'Xoá thành công!', 'html_table' => $html_table]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']); 
        }
    }
}
