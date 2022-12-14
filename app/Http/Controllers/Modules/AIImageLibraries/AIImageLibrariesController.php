<?php
namespace App\Http\Controllers\Modules\AIImageLibraries;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Validator;
//Models
use App\Models\Modules\ModuleImageLibraries;
use App\Models\Modules\PartialModuleLibraryImages;
//Controllers
use App\Http\Controllers\MainStructure\Admins\LogsController;
use App\Http\Controllers\MainStructure\Users\CheckRoleByUser;
//Requests
use App\Http\Requests\Module\ModuleImageLibrariesRequest;

class AIImageLibrariesController extends Controller {

    public function index() {
        if(CheckRoleByUser::checkRoleModuleByUser('view') == false || CheckRoleByUser::checkRoleFunctionByUser('view',1) == false){
             abort('404');
        } else {
            $data['table_html'] = $this->dataTableLibrary();
            $data['check_add'] = CheckRoleByUser::checkRoleModuleByUser('add');
        	return view('modules.AIImageLibraries.index', $data);
        }
    }

    public function ajaxLibrary(Request $request){
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

    public function dataTableLibrary(){
        $html = '';
        $libraries = ModuleImageLibraries::orderBy('status')->orderBy('created_at','desc')->get();
        if($libraries){
            foreach ($libraries as $library){
                $html .= '<tr>';
                $html .= '  <td>'.$library->name.'</td>';
                $html .= '  <td>'.$library->description.'</td>';

                ($library->status == 1) ? ($html .='  <td class="text-success"><strong>Hiển thị</strong></td>') : ($html .='  <td class="text-danger"><strong>Ẩn</strong></td>');

                $html .= '<td>';
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#actionLibraryModal" onclick="func_buttonClick(`editLibrary`,'.$library->id.')">
                                    <i class="fa fa-pencil"></i><span class="ml-2">Sửa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('delete') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick(`deleteLibrary`,'.$library->id.')">
                                    <i class="fa fa-times"></i><span class="ml-2">Xóa</span>
                                </button>';
                }
                if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
                $html .= '      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewImagesModal" onclick="func_buttonClick(`viewLibrary`,'.$library->id.')">
                                    <i class="fa fa-picture-o"></i><span class="ml-2">Ảnh</span>
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
            $library = ModuleImageLibraries::find( $request->input('id') );
            return response()->json(['error'=>false, 'library'=>$library]);
        } catch(Exception $e) {
            return response()->json(['error'=>true, 'message' => 'Lấy dữ liệu thất bại']);
        }
    }
    public function add($request){
        try{
            $validator = Validator::make($request->all(), ModuleImageLibrariesRequest::rules($request->input('id')), ModuleImageLibrariesRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                ModuleImageLibraries::create($input);
                $html = $this->dataTableLibrary();
                return response()->json(['error'=>false, 'message'=>'Thêm mới thành công!', 'table_html'=> $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Thêm mới thất bại!']);
        }
    }
    public function edit($request){
        try{
            $validator = Validator::make($request->all(), ModuleImageLibrariesRequest::rules($request->input('id')), ModuleImageLibrariesRequest::messages());
            if($validator->fails()){
                return response()->json(['error' => true, 'validate' => false, 'message' => $validator->messages()->all()]);
            } else {
                $input = $request->all();
                $input['status'] = ($request->input('status') == 1 ? 1 : 0);
                $library = ModuleImageLibraries::find( $request->input('id') );
                $library->update($input);
                $html = $this->dataTableLibrary();
                return response()->json(['error'=>false, 'message'=>'Chỉnh sửa thành công!', 'table_html'=> $html ]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Chỉnh sửa thất bại!']);
        }
    }
    public function delete($request){
        try{
            $id_library = $request->input('id');
            $imageslibrary = PartialModuleLibraryImages::where('library_id',$id_library)->get();
            if(count($imageslibrary)>0){
                return response()->json(['error'=>true, 'message'=>'Thư viện ảnh có chứa ảnh!']);
            } else {
                $library = ModuleImageLibraries::find($request->input('id'));
                $library->delete();
                $html = $this->dataTableLibrary();
                return response()->json(['error'=>false, 'message'=>'Xoá thành công!', 'table_html'=> $html]);
            }
        } catch (Exception $e) {
            return response()->json(['error'=>true, 'message'=>'Xoá thất bại!']);
        }
    }


// Function Image
    public function ajaxImageLibrary(Request $request){
        $path = '/upload/library/';
        if (!\File::exists(public_path().$path)) {
            \File::makeDirectory(public_path().$path, 0755, true);
        }
        if( CheckRoleByUser::checkRoleModuleByUser('edit') == true ){
            $action_type = $request->input('action_type');
            if( $action_type == 'list' ) {
                try {
                    $id_library = $request->input('id');
                    $imageslibrary = PartialModuleLibraryImages::where('library_id',$id_library)->get();

                    if(count($imageslibrary)>0){
                        $html=$this->htmlViewPartialModuleLibraryImages($id_library);
                        return response()->json(['error'=>false, 'html'=>$html]);
                    } else {
                        return response()->json(['error'=>false, 'html'=>'<div class="px-3">Không có ảnh trong thư viện ảnh</div>']);
                    }
                } catch (Exception $e) {
                    return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu không thành công!']);
                }
            }
            if( $action_type == 'image' ){
                try {
                    $image = PartialModuleLibraryImages::find( $request->input('id') );
                    return response()->json(['error'=>false, 'message'=>'Lấy dữ liệu thành công!', 'image'=>$image]);
                } catch (Exception $e) {
                    return response()->json(['error'=>true, 'message'=>'Lấy dữ liệu không thành công!']);
                }
            } 
            if( $action_type == 'add' ){
                try{
                    $myFile = $_FILES['addfiles'];
                    $fileCount = count($myFile["name"]);
                    for ($i = 0; $i < $fileCount; $i++) {
                        $image = new PartialModuleLibraryImages;
                        $image->library_id=$request->input('input_id_library');
                        $random_file_name = Str::random(4).'_'.$myFile["name"][$i];
                        while(file_exists(public_path().$path.$random_file_name)){
                            $random_file_name = Str::random(4).'_'.$file_name;
                        }
                        $image->name = $random_file_name;
                        $image->path = $path.$random_file_name;
                        move_uploaded_file($myFile["tmp_name"][$i], public_path().$path.$random_file_name);
                        $image->save();
                    }
                    $html = $this->htmlViewPartialModuleLibraryImages( $request->input('input_id_library') );
                    LogsController::write("AIImageLibraries", "Thêm ảnh", "Thư viện ảnh: ".$image->library->name."; Tên ảnh: ".$random_file_name); 
                    return response()->json(['error'=>false, 'message'=>'Thêm ảnh thành công!', 'html'=>$html]);
                } catch (Exception $e) {
                    return response()->json(['error'=>true, 'message'=>'Thêm không thành công!']);
                }
            }
            if( $action_type == 'edit' ){
                try{
                    $input = $request->all();
                    $input['status'] = ($request->input('status') == 1 ? 1 : 0);
                    $image = PartialModuleLibraryImages::find( $request->input('id') );
                    rename( public_path().$image->path , public_path().$path.$input['name'] );
                    $input['path'] = $path.$input['name'];
                    $image->update($input);

                    $html = $this->htmlViewPartialModuleLibraryImages( $image->library_id );  
                    return response()->json(['error'=>false, 'message'=>'Chỉnh sửa ảnh thành công!', 'html'=>$html]);
                    LogsController::write("AIImageLibraries", "Sửa ảnh", "Thư viện ảnh: ".$image->library->name."; Tên ảnh: ".$input['name']); 
                } catch (Exception $e) {
                    return response()->json(['error'=>true, 'message'=>'Chỉnh sửa không thành công!']);
                }
            } 
            else if ( $action_type == 'delete' ) {
                try{
                    $image = PartialModuleLibraryImages::find( $request->input('id') );
                    File::delete( public_path().$image->path );
                    $image->delete();

                    $html = $this->htmlViewPartialModuleLibraryImages( $image->library_id );
                    LogsController::write("AIImageLibraries", "Xoá ảnh", "Thư viện ảnh: ".$image->library->name."; Tên ảnh: ".$image->name); 
                    return response()->json(['error'=>false, 'message'=>'Xóa ảnh thành công!', 'html'=>$html]);
                } catch (Exception $e) {
                    return response()->json(['error'=>true, 'message'=>'Xóa không thành công!']);
                }
            }
        } else {
            return response()->json(['error'=>true, 'message'=>'Không được phân quyền!']);
        }

    }
    public function htmlViewPartialModuleLibraryImages($id_library){
        $html='';
        $images = PartialModuleLibraryImages::where('library_id',$id_library)->orderby('status','desc')->orderBy('order','asc')->get();
        foreach($images as $image){
            $html.='<div class="item-image">';
            if ($image->status == 0) {
                $html.='<img id="image_'.$image->id.'" src="'.$image->path.'" class="image-in-view-library disabled" onclick="func_getInformationImage('.$image->id.')">';
            } else {
                $html.='<img id="image_'.$image->id.'" src="'.$image->path.'" class="image-in-view-library" onclick="func_getInformationImage('.$image->id.')">';
            }
            
            $html.='<span class="delete-image" onclick="func_deleteImageInLibrary('.$image->id.')">&times;</span>';
            $html.='</div>'; 
        }
        return $html;
    }
}
