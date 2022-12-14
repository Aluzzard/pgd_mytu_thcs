<?php

namespace App\Http\Controllers\Modules\AIBannerFooter;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\Modules\ModuleBannerFooter;
//Requests
use App\Http\Requests\Module\ModuleBannerFooterRequest;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;

class AIBannerFooterController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
        	$data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
        	return view('modules.AIBannerFooter.index', $data);
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
    	$banners = ModuleBannerFooter::orderBy('is_active')->orderBy('created_at','desc')->get();
        $html = '';
        if($banners){
            foreach ($banners as $banner){
                $html .= '<tr>';
                if ($banner->is_default == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                if ($banner->is_active == 1) {
                    $html .= '  <td><input type="checkbox" checked disabled="true"</td>';
                } else {
                    $html .= '  <td><input type="checkbox" disabled="true"</td>';
                }
                $html .= '  <td>'.$banner->name.'</td>';
                ($banner->type == 1) ? $html .='<td>Banner</td>' : $html .='<td>Footer</td>';
                $html .= '  <td>'.$banner->show_from_date.'</td>';
                $html .= '  <td>'.$banner->show_to_date.'</td>';
                $html .= '  <td>'.$banner->created_at.'</td>';
                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$banner->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$banner->id.')">
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
            $banner = ModuleBannerFooter::find( $request->input('id') );
            return response()->json(['error'=> false, 'banner'=>$banner]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
            $validator = Validator::make($request->all(), ModuleBannerFooterRequest::rules($request->input('id')), ModuleBannerFooterRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                ModuleBannerFooter::create($input);
                $html = $this->dataTable();
                LogsController::write("AIBannerFooter", "Thêm", "Banner: ".$input["name"]);
                return response()->json(['error'=> false, 'message' => 'Thêm banner thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm banner thất bại']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), ModuleBannerFooterRequest::rules($request->input('id')), ModuleBannerFooterRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $banner = ModuleBannerFooter::find( $request->input('id') );
                $banner->update($input);
                $html = $this->dataTable();
                LogsController::write("AIBannerFooter", "Sửa", "Banner: ".$input["name"]);
                return response()->json(['error'=> false, 'message' => 'Sửa banner thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Sửa banner thất bại']);
        }
    }
    public function delete($request){
        try {
            $banner_id = $request->input('id');
            // $products = ModuleAgriculturalProducts::where('enterprise_id', $banner_id)->get();
            // if( count($products)>0 ) {
            //     return response()->json(['error'=> true, 'message' => 'banner có chứa sản phẩm! Xóa sản phẩm trước']);
            // } else {
                $banner = ModuleBannerFooter::find( $banner_id );
                $banner->delete();
                LogsController::write("AIBannerFooter", "Xoá", "Banner: ".$banner->name);
            // }
            $html = $this->dataTable();
            return response()->json(['error'=> false, 'message' => 'Xóa banner thành công', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa banner thất bại']);
        }
    }
}
