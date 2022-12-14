<?php

namespace App\Http\Controllers\Modules\AISchoolTimetable;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
use ZipArchive;
//Models
use App\Models\Modules\ModuleSchoolTimetable;
//Requests
use App\Http\Requests\Module\ModuleSchoolTimetableRequest;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class AISchoolTimetableController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
        	$data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
        	return view('modules.AISchoolTimetable.index', $data);
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
        	// else if( $action_type == 'edit' ) {
         //        if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
         //            return $this->edit($request);
         //        } else {
         //            return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
         //        }
        	// }
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
    	$timetables = ModuleSchoolTimetable::get();
        $html = '';
        if($timetables){
            foreach ($timetables as $timetable){
                $html .= '<tr>';
                $html .= '  <td>'.$timetable->name.'</td>';
                $html .= '  <td>'.date('d/m/Y', strtotime($timetable->date)).'</td>';
                $html .= '  <td>';
                // if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                // $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$timetable->id.')">
                //                     <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                //                 </button>';
                // }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$timetable->id.')">
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
            $timetable = ModuleSchoolTimetable::find( $request->input('id') );
            return response()->json(['error'=> false, 'timetable'=>$timetable]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
        	$validator = Validator::make($request->all(), ModuleSchoolTimetableRequest::rules($request->input('id')), ModuleSchoolTimetableRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
	        	$input = $request->input();
	            $zip = new ZipArchive();
		        $status = $zip->open($request->file("file")->getRealPath());
		        if ($status !== true) {
		         throw new \Exception($status);
		        }
		        else{
		            $storageDestinationPath= public_path().("/upload/timetable/".$request->input('date'));
		       	
		            if (!\File::exists( $storageDestinationPath)) {
		                \File::makeDirectory($storageDestinationPath, 0755, true);
		            }
		            $zip->extractTo($storageDestinationPath);
		            $zip->close();
		        }
		        ModuleSchoolTimetable::create($input);
		        $html = $this->dataTable();
		        LogsController::write("AISchoolTimetable", "Thêm", "Thời khóa biểu: ".$input["name"]);
		        return response()->json(['error'=> false, 'message' => 'Thêm thời khóa biểu thành công', 'table_html' => $html]);
		    }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm thời khóa biểu thất bại']);
        }
    }
    // public function edit($request){
    //     try {
    //         $validator = Validator::make($request->all(), ModuleSchoolTimetableRequest::rules1($request->input('id')), ModuleSchoolTimetableRequest::messages());
    //         if($validator->fails()){
    //             return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
    //         } else {
	   //      	$input = $request->input();
	   //      	$timetable = ModuleSchoolTimetable::find($request->input('id'));
	   //      	if($request->input('file')){
	   //      		\File::deleteDirectory(public_path().("/upload/timetable/".date('Y-m-d', strtotime($timetable->date))) );

	   //      		$zip = new ZipArchive();
			 //        $status = $zip->open($request->file("file")->getRealPath());
			 //        if ($status !== true) {
			 //         throw new \Exception($status);
			 //        }
			 //        else{
			 //            $storageDestinationPath= public_path().("/upload/timetable/".$request->input('date'));
			       	
			 //            if (!\File::exists( $storageDestinationPath)) {
			 //                \File::makeDirectory($storageDestinationPath, 0755, true);
			 //            }
			 //            $zip->extractTo($storageDestinationPath);
			 //            $zip->close();
			 //        }
	   //      	}
	   //          $timetable->update($input);
		  //       $html = $this->dataTable();
		  //       LogsController::write("AISchoolTimetable", "Sửa", "Thời khóa biểu: ".$input["name"]);
		  //       return response()->json(['error'=> false, 'message' => 'Sửa thời khóa biểu thành công', 'table_html' => $html]);
		  //   }
    //     } catch (Exception $e) {
    //          return response()->json(['error'=> true, 'message' => 'Sửa doanh nghiệp thất bại']);
    //     }
    // }
    public function delete($request){
        try {
            $timetable = ModuleSchoolTimetable::find( $request->input('id') );
           	\File::deleteDirectory(public_path().("/upload/timetable/".date('Y-m-d', strtotime($timetable->date))) );
           	$timetable->delete();
            $html = $this->dataTable();
            return response()->json(['error'=> false, 'message' => 'Xóa thời khóa biểu thành công', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa thời khóa biểu thất bại']);
        }
    }
}
