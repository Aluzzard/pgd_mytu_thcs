<?php
namespace App\Http\Controllers\Modules\AISchools;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\Modules\ModuleSchools;
//Controllers
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleSchoolsRequest;

class AISchoolsController extends Controller {
    //
    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
        	$data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
            return view('modules.AISchools.index', $data);
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

    // Danh sách các modules
    public function dataTable(){
        $html = '';
        $links = ModuleSchools::orderBy('is_active')->orderBy('category_id')->orderBy('sort')->get();
        if($links){
            foreach ($links as $link){
                $html .= '<tr>';
                $html .= '  <td>'.$link->sort.'</td>';
                $html .= '  <td>'.$link->name.'</td>';
                
                $html .= '  <td><a href="'.$link->slug.'" target="_blank">'.$link->slug.'</a></td>';
                if( $link->category_id == 1){
                    $html .= '  <td>Trường Mầm non</td>';
                } else if( $link->category_id == 2){
                    $html .= '  <td>Trường Tiểu học</td>';
                } else {
                    $html .= '  <td>Trường THCS</td>';
                }
                
                if ($link->is_active == 1) {
                    $html .= '  <td><strong class="text-success">Hiện</strong></td>';
                } else {
                    $html .= '  <td><strong class="text-danger">Ẩn</strong></td>';
                }
                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$link->id.')">
                                    <i class="fa fa-edit"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$link->id.')">
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
            $link = ModuleSchools::find( $request->input('id') );
            return response()->json(['error'=>false, 'link'=>$link]);
        } catch(Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Không thể lấy dữ liệu!']);
        }
    }
    public function add($request){
        try{
            $validator = Validator::make($request->all(), ModuleSchoolsRequest::rules($request->input('id')), ModuleSchoolsRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                ModuleSchools::create($input);
                $table_html = $this->dataTable();
                return response()->json(['error'=>false, 'message'=>'Thêm trường thành cóng!', 'table_html'=>$table_html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Thêm trường thất bại!']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleSchoolsRequest::rules($request->input('id')), ModuleSchoolsRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $input['is_active'] = ($request->input('is_active') == 1 ? 1 : 0);
                $link = ModuleSchools::find( $request->input('id') );
                $link->update($input);
                $table_html = $this->dataTable();
                return response()->json(['error'=>false, 'message'=>'Chỉnh sửa thành công!', 'table_html'=>$table_html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Chỉnh sửa thất bại!']);
        }
    }
    public function delete($request){
        try {
            $link = ModuleSchools::find($request->input('id'));
            $link->delete();

            $table_html = $this->dataTable();
            return response()->json(['error'=>false, 'message'=>'Xoá thành công!', 'table_html'=>$table_html]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']);
        }
    }
}
