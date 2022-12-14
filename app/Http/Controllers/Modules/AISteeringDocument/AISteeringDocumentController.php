<?php

namespace App\Http\Controllers\Modules\AISteeringDocument;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
//Models
use App\Models\Modules\ModuleSteeringDocument;
use App\Models\Modules\PartialModuleSteeringDocumentByField;
use App\Models\Modules\PartialModuleSteeringDocumentIssuedByOrganizations;
use App\Models\Modules\PartialModuleSteeringDocumentOfType;
//Requests
use App\Http\Requests\Module\ModuleSteeringDocumentRequest;
use App\Http\Requests\Module\PartialModuleSteeringDocumentByFieldRequest;
use App\Http\Requests\Module\PartialModuleSteeringDocumentIssuedByOrganizationsRequest;
use App\Http\Requests\Module\PartialModuleSteeringDocumentOfTypeRequest;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class AISteeringDocumentController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['fields'] = PartialModuleSteeringDocumentByField::all();
            $data['types'] = PartialModuleSteeringDocumentOfType::all();
            $data['organizations'] = PartialModuleSteeringDocumentIssuedByOrganizations::all();
        	$data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
        	return view('modules.AISteeringDocument.index', $data);
        }
    }

    public function ajaxDocument(Request $request){
        if(CheckRoleByUser::checkRoleModuleByUser('view') == true || CheckRoleByUser::checkRoleFunctionByUser('view',1) == true){
        	$action_type = $request->input('action_type');
        	if ($action_type == 'view' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('view') == true ){
                    return $this->view($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Kh??ng ???????c ph??n quy???n!']);
                }
        	}
        	else if($action_type == 'add' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('add') == true ){
                    return $this->add($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Kh??ng ???????c ph??n quy???n!']);
                }
        	}
        	else if( $action_type == 'edit' ) {
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                    return $this->edit($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Kh??ng ???????c ph??n quy???n!']);
                }
        	}
        	else if($action_type == 'delete' ) {
        		if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                    return $this->delete($request);
                } else {
                    return response()->json(['error'=>true, 'message'=>'Kh??ng ???????c ph??n quy???n!']);
                }
        	}
        } else {
            abort('404');
        }
    }
    public function dataTable(){
    	$documents = ModuleSteeringDocument::orderBy('date_issue','desc')->get();
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
                                    <i class="fa fa-pencil"></i><span class="ml-2">S???a</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$document->id.')">
                                    <i class="fa fa-times"></i><span class="ml-2">X??a</span>
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
            $document = ModuleSteeringDocument::find( $request->input('id') );
            return response()->json(['error'=> false, 'document'=>$document]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'L???y d??? li???u th???t b???i']);
        }
    }
    public function add($request){
        try {
            $validator = Validator::make($request->all(), ModuleSteeringDocumentRequest::rules($request->input('id')), ModuleSteeringDocumentRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();

                $file = $request->file('file');
                $file_extension = $file->getClientOriginalExtension(); // L???y ??u??i c???a file
                $file_name = $file->getClientOriginalName();
                $random_file_name = Str::random(4).'_'.$file_name;
                while(file_exists(public_path().'/upload/document/steeringdocument/'.$random_file_name)){
                    $random_file_name = Str::random(4).'_'.$file_name;
                }
                $file->move(public_path().'/upload/document/steeringdocument',$random_file_name);
                $input['file'] = $file_name;
                $input['file_path'] = '/upload/document/steeringdocument/'.$random_file_name;

                ModuleSteeringDocument::create($input);
                $html = $this->dataTable();
                LogsController::write("AISteeringDocument", "Th??m", "V??n b???n: ".$input["number"]);
                return response()->json(['error'=> false, 'message' => 'Th??m v??n b???n th??nh c??ng', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Th??m v??n b???n th???t b???i']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleSteeringDocumentRequest::rules2($request->input('id')), ModuleSteeringDocumentRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $document = ModuleSteeringDocument::find( $request->input('id') );

                if($request->hasFile('file')){
                    if($document->file_path != ''){
                        unlink(public_path().$document->file_path);
                    }
                    $file = $request->file('file');
                    $file_extension = $file->getClientOriginalExtension(); // L???y ??u??i c???a file
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
                LogsController::write("AISteeringDocument", "S???a", "V??n b???n: ".$input["number"]);
                return response()->json(['error'=> false, 'message' => 'S???a v??n b???n th??nh c??ng', 'table_html' => $html]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'S???a v??n b???n th???t b???i']);
        }
    }
    public function delete($request){
        try {
            $document = ModuleSteeringDocument::find( $request->input('id') );
            unlink(public_path().$document->file_path);
            $document->delete();
            $html = $this->dataTable();
            LogsController::write("AISteeringDocument", "Xo??", "V??n b???n: ".$document->number);
            return response()->json(['error'=> false, 'message' => 'X??a v??n b???n th??nh c??ng', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'X??a v??n b???n th???t b???i']);
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
                                        <i class="fa big-icon fa-times"></i><span class="ml-2">X??a</span>
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
                $data = PartialModuleSteeringDocumentByField::all();
            } else if($request->input('type') == 'type'){
                $data = PartialModuleSteeringDocumentOfType::all();
            } else if($request->input('type') == 'organization'){
                $data = PartialModuleSteeringDocumentIssuedByOrganizations::all();
            }     
            $html_table = $this->dataTableCategory($data);
            return response()->json(['error'=>false, 'message'=>'L???y d??? li???u th??nh c??ng!', 'html_table' => $html_table]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'L???y d??? li???u th???t b???i!']); 
        }
    }
    public function viewCategory($request){
        try {
            if($request->input('type') == 'field'){
                $data = PartialModuleSteeringDocumentByField::find( $request->input('id') );
            } else if($request->input('type') == 'type'){
                $data = PartialModuleSteeringDocumentOfType::find( $request->input('id') );
            } else if($request->input('type') == 'organization'){
                $data = PartialModuleSteeringDocumentIssuedByOrganizations::find( $request->input('id') );
            }  
            return response()->json(['error'=>false, 'message'=>'L???y d??? li???u th??nh c??ng!', 'data' => $data]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'L???y d??? li???u th???t b???i!']); 
        }
    }
    public function addCategory($request){
        try {
            $input = $request->input();
            if($request->input('type') == 'field'){
                $validator = Validator::make($request->all(), PartialModuleSteeringDocumentByFieldRequest::rules($request->input('id')), PartialModuleSteeringDocumentByFieldRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    PartialModuleSteeringDocumentByField::create($input);
                    LogsController::write("AISteeringDocument", "Th??m", "L??nh v???c: ".$request->input('name'));
                }
            } else if($request->input('type') == 'type'){
                $validator = Validator::make($request->all(), PartialModuleSteeringDocumentOfTypeRequest::rules($request->input('id')), PartialModuleSteeringDocumentOfTypeRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    PartialModuleSteeringDocumentOfType::create($input);
                    LogsController::write("AISteeringDocument", "Th??m", "Lo???i: ".$request->input('name'));
                }
            } else if($request->input('type') == 'organization'){
                $validator = Validator::make($request->all(), PartialModuleSteeringDocumentIssuedByOrganizationsRequest::rules($request->input('id')), PartialModuleSteeringDocumentIssuedByOrganizationsRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    PartialModuleSteeringDocumentIssuedByOrganizations::create($input);
                    LogsController::write("AISteeringDocument", "Th??m", "C?? quan ban h??nh: ".$request->input('name'));
                }
            } 
            if($request->input('type') == 'field'){
                $data1 = PartialModuleSteeringDocumentByField::all();
            } else if($request->input('type') == 'type'){
                $data1 = PartialModuleSteeringDocumentOfType::all();
            } else if($request->input('type') == 'organization'){
                $data1 = PartialModuleSteeringDocumentIssuedByOrganizations::all();
            } 
            $html_table = $this->dataTableCategory($data1);
            return response()->json(['error'=>false, 'message'=>'Th??m m???i th??nh c??ng!', 'html_table' => $html_table]); 
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Th??m m???i th???t b???i!']); 
        }
    }
    public function editCategory($request){
        try {
            $input = $request->input();
            if($request->input('type') == 'field'){
                $validator = Validator::make($request->all(), PartialModuleSteeringDocumentByFieldRequest::rules($request->input('id')), PartialModuleSteeringDocumentByFieldRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    $data = PartialModuleSteeringDocumentByField::find( $request->input('id') );
                    $data->update($input);
                    LogsController::write("AISteeringDocument", "S???a", "L??nh v???c: ".$request->input('name'));
                }
            } else if($request->input('type') == 'type'){
                $validator = Validator::make($request->all(), PartialModuleSteeringDocumentOfTypeRequest::rules($request->input('id')), PartialModuleSteeringDocumentOfTypeRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    $data = PartialModuleSteeringDocumentOfType::find( $request->input('id') );
                    $data->update($input);
                    LogsController::write("AISteeringDocument", "S???a", "Lo???i: ".$request->input('name'));
                }
            } else if($request->input('type') == 'organization'){
                $validator = Validator::make($request->all(), PartialModuleSteeringDocumentIssuedByOrganizationsRequest::rules($request->input('id')), PartialModuleSteeringDocumentIssuedByOrganizationsRequest::messages());
                if($validator->fails()){
                    return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
                } else {
                    $data = PartialModuleSteeringDocumentIssuedByOrganizations::find( $request->input('id') );
                    $data->update($input);
                    LogsController::write("AISteeringDocument", "S???a", "C?? quan ban h??nh: ".$request->input('name'));
                }
            }  
            if($request->input('type') == 'field'){
                $data1 = PartialModuleSteeringDocumentByField::all();
            } else if($request->input('type') == 'type'){
                $data1 = PartialModuleSteeringDocumentOfType::all();
            } else if($request->input('type') == 'organization'){
                $data1 = PartialModuleSteeringDocumentIssuedByOrganizations::all();
            } 
            $html_table = $this->dataTableCategory($data1);
            return response()->json(['error'=>false, 'message'=>'S???a ?????i th??nh c??ng!', 'html_table' => $html_table]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'C???p nh???t th???t b???i!']); 
        }
    }
    public function deleteCategory($request){
        try {
            if($request->input('type') == 'field'){
                $datas = ModuleSteeringDocument::whereFieldId( $request->input('id') )->get();
            } else if($request->input('type') == 'type'){
                $datas = ModuleSteeringDocument::whereTypeId( $request->input('id') )->get();
            } else if($request->input('type') == 'organization'){
                $datas = ModuleSteeringDocument::whereOrganizationId( $request->input('id') )->get();
            }  
            if(count($datas)>0){
                return response()->json(['error'=>true, 'message'=>'Xo?? th???t b???i! T???n t???i v??n b???n ??ang s??? d???ng!']); 
            } else {
                if($request->input('type') == 'field'){
                    $data = PartialModuleSteeringDocumentByField::find( $request->input('id') );
                    $data->delete();
                    LogsController::write("AISteeringDocument", "Xo??", "L??nh v???c: ".$request->input('name'));
                } else if($request->input('type') == 'type'){
                    $data = PartialModuleSteeringDocumentOfType::find( $request->input('id') );
                    $data->delete();
                    LogsController::write("AISteeringDocument", "Xo??", "Lo???i: ".$request->input('name'));
                } else if($request->input('type') == 'organization'){
                    $data = PartialModuleSteeringDocumentIssuedByOrganizations::find( $request->input('id') );
                    $data->delete();
                    LogsController::write("AISteeringDocument", "Xo??", "C?? quan ban h??nh: ".$request->input('name'));
                }  
                if($request->input('type') == 'field'){
                    $data1 = PartialModuleSteeringDocumentByField::all();
                } else if($request->input('type') == 'type'){
                    $data1 = PartialModuleSteeringDocumentOfType::all();
                } else if($request->input('type') == 'organization'){
                    $data1 = PartialModuleSteeringDocumentIssuedByOrganizations::all();
                } 
                $html_table = $this->dataTableCategory($data1);
                return response()->json(['error'=>false, 'message'=>'Xo?? th??nh c??ng!', 'html_table' => $html_table]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xo?? th???t b???i!']); 
        }
    }
}
