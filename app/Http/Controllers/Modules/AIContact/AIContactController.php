<?php
namespace App\Http\Controllers\Modules\AIContact;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Validator;
//Models
use App\Models\Modules\ModuleContacts;
//Controllers
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleContactRequest;

class AIContactController extends Controller {
    //
    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['table_html'] = $this->dataTable();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
            return view( 'modules.AIContact.index', $data );
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
    	$contacts = ModuleContacts::orderBy('status', 'asc')->get();
        $html = '';
        if($contacts){
            foreach ($contacts as $contact){
                $html .= '<tr>';
                $html .= '  <td>'.$contact->name.'</td>';
                $html .= '  <td>'.$contact->numberphone.'</td>';
                $html .= '  <td>'.$contact->email.'</td>';
                $html .= '  <td>'.$contact->content.'</td>';

                ($contact->status == 1) ? ($html .= '  <td class="text-success"><strong>Đã xử lý</strong></td>') : ($html .= '  <td class="text-danger"><strong>Chưa xử lý</strong></td>');
                $html .= '  <td>'.$contact->created_at.'</td>';

                $html .= '  <td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
            	$html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick(`edit`,'.$contact->id.')">
                                <i class="fa fa-check"></i><span class="ml-2">Sửa</span>
                            </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
            	$html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`delete`,'.$contact->id.')">
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
        try{
            $contact = ModuleContacts::find($request->input('id'));
            return response()->json(['error'=>false, 'message'=>'Lấy dữ liệu thành công!', 'contact' => $contact]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu thất bại!']);
        }
    }
    public function add($request){
        try{
            $validator = Validator::make($request->all(), ModuleContactRequest::rules($request->input('id')), ModuleContactRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                ModuleContacts::create($input);

                $html = $this->dataTable();
                return response()->json(['error'=>false, 'message'=>'Chỉnh sửa thành công!', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Chỉnh sửa thất bại!']);
        }
    }
    public function edit($request){
        try{
            $validator = Validator::make($request->all(), ModuleContactRequest::rules($request->input('id')), ModuleContactRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $input['status'] = ($request->input('status') == 1 ? 1 : 0);
                $contact = ModuleContacts::find($request->input('id'));
                $contact->update($input);

                $html = $this->dataTable();
                return response()->json(['error'=>false, 'message'=>'Chỉnh sửa thành công!', 'table_html' => $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Chỉnh sửa thất bại!']);
        }
    }
    public function delete($request){
        try{
            $contact = ModuleContacts::find($request->input('id'));
            $contact->delete();

            $html = $this->dataTable();
            return response()->json(['error'=>false, 'message'=>'Xoá thành công!', 'table_html' => $html]);
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']);
        }
    }
}
