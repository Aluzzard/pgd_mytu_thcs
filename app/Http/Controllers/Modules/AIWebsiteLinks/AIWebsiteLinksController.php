<?php
namespace App\Http\Controllers\Modules\AIWebsiteLinks;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\Modules\ModuleWebsiteLinks;
//Controllers
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleWebsiteLinksRequest;

class AIWebsiteLinksController extends Controller {
    //
    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
        	$data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
            return view('modules.AIWebsiteLinks.index', $data);
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
        $links = ModuleWebsiteLinks::orderBy('status')->orderBy('sort')->get();
        if($links){
            foreach ($links as $link){
                $html .= '<tr>';
                $html .= '  <td>'.$link->name.'</td>';
                $html .= '  <td>'.$link->sort.'</td>';
                $html .= '  <td><img src="'.$link->avatar.'" style="height:50px;"></td>';
                $html .= '  <td><a href="'.$link->slug.'" target="_blank">'.$link->slug.'</a></td>';
                if ($link->status == 1) {
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
            $link = ModuleWebsiteLinks::find( $request->input('id') );
            return response()->json(['error'=>false, 'link'=>$link]);
        } catch(Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Không thể lấy dữ liệu!']);
        }
    }
    public function add($request){
        try{
            $validator = Validator::make($request->all(), ModuleWebsiteLinksRequest::rules($request->input('id')), ModuleWebsiteLinksRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                ModuleWebsiteLinks::create($input);
                $table_html = $this->dataTable();
                return response()->json(['error'=>false, 'message'=>'Thêm liên kết thành cóng!', 'table_html'=>$table_html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Thêm liên kết thất bại!']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleWebsiteLinksRequest::rules($request->input('id')), ModuleWebsiteLinksRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $input['status'] = ($request->input('status') == 1 ? 1 : 0);
                $link = ModuleWebsiteLinks::find( $request->input('id') );
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
            $link = ModuleWebsiteLinks::find($request->input('id'));
            $link->delete();

            $table_html = $this->dataTable();
            return response()->json(['error'=>false, 'message'=>'Xoá thành công!', 'table_html'=>$table_html]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']);
        }
    }
}
