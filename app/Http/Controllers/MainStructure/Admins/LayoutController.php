<?php

namespace App\Http\Controllers\MainStructure\Admins;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\MainStructure\SysGuestLayout;
//Requests
use App\Http\Requests\MainStructure\LayoutRequest;

class LayoutController extends Controller {
    public function index(){
        $data['table_html'] = $this->dataTable();
        return view('mainstructure.pages.admins.CustomInterface.layout', $data);
	}
	public function ajax(Request $request){
        $action_type = $request->input('action_type');
        if ($action_type == 'view' ) {
            return $this->view($request);
        }
        else if($action_type == 'add' ) {
            return $this->add($request);
        }
        else if( $action_type == 'edit' ) {
            return $this->edit($request);
        }
        else if($action_type == 'delete' ) {
            return $this->delete($request);
        }
    }
	
    public function dataTable(){
        $layouts = SysGuestLayout::all();
        $html = '';
        if($layouts){
            foreach ($layouts as $layout){
                $html .= '<tr>';
                $html .= '  <td>'.$layout->name.'</td>';
                $html .= '  <td><img src="'.$layout->avatar.'" width="100"></td>';
                $html .= '  <td>'.$layout->content.'</td>';
                $html .= '  <td>';
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$layout->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$layout->id.')">
                                    <i class="fa fa-times"></i><span class="ml-2">Xóa</span>
                                </button>';
                $html .= '  </td>';                     
                $html .= '</tr>';
            }
        }
        return $html;
    }
    public function view($request){
        try {
            $layout = SysGuestLayout::find( $request->input('id') );
            return response()->json(['error'=> false, 'layout'=>$layout]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try {
            $validator = Validator::make($request->all(), LayoutRequest::rules($request->input('id')), LayoutRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                SysGuestLayout::create($input);
                if($request->hasFile('avatar')){
                    $file = $request->file('avatar');
                    $file_name = $file->getClientOriginalName();
                    $file->move( public_path().'/assets/administration/mainstructure/img/layout/',$file_name );
                    $input['avatar'] = '/assets/administration/mainstructure/img/layout/'.$file_name;
                }
                $table_html = $this->dataTable();
                return response()->json(['error'=> false, 'message' => 'Thêm layout thành công', 'table_html' => $table_html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=> true, 'message' => 'Thêm layout thất bại']);
        }
    }
    public function edit($request){
        try {
            $validator = Validator::make($request->all(), LayoutRequest::rules($request->input('id')), LayoutRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $layout = SysGuestLayout::find( $request->input('id') );
                if($request->hasFile('avatar')){
                    if($layout->avatar != ''){
                        unlink(public_path().$layout->avatar);
                    }
                    $file = $request->file('avatar');
                    $file_name = $file->getClientOriginalName();
                    $file->move( public_path().'/assets/administration/mainstructure/img/layout/',$file_name );
                    $input['avatar'] = '/assets/administration/mainstructure/img/layout/'.$file_name;
                }
                $layout->update($input);
                $html = $this->dataTable();
                return response()->json(['error'=> false, 'message' => 'Sửa layout thành công', 'table_html' => $html]);
            }
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Sửa layout thất bại']);
        }
    }
    public function delete($request){
        try {
            $layout_id = $request->input('id');
            $layout = SysGuestLayout::find( $layout_id );
            $layout->delete();
            
            $html = $this->dataTable();
            return response()->json(['error'=> false, 'message' => 'Xóa layout thành công', 'table_html' => $html]);
        } catch (Exception $e) {
             return response()->json(['error'=> true, 'message' => 'Xóa layout thất bại']);
        }
    }
}
