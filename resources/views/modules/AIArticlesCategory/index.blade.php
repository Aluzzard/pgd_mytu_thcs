@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý chuyên mục')

@section('css')
<!-- tree viewer CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/tree-viewer/tree-viewer.css') }}">
@endsection

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list">
                            <h4>Danh sách chuyên mục</h4>
                            <div class="sparkline8-graph">
                                <div class="text-right">
                                    @if($check_add == true )
                                    <button type="button" class="btn btn-custon-four btn-success" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('add')"><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm</span></button>
                                    @endif
                                    @if($check_edit == true )
                                    <button type="button" class="btn btn-custon-four btn-warning" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('edit')"><i class="fa big-icon fa-pencil"></i><span class="ml-2">Sửa</span></button>
                                    @endif
                                    @if($check_delete == true )
                                    <button type="button" class="btn btn-custon-four btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="func_buttonClick('delete')"><i class="fa big-icon fa-times"></i><span class="ml-2">Xóa</span></button>
                                    @endif
                                </div>
                                <div class="tree-viewer-area mg-b-15">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="sparkline9-list">
                                                    <div class="sparkline9-graph">
                                                        <div class="adminpro-content res-tree-ov">
                                                            <div id="jstree">
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Data table area End-->
    </div>
</div>
@endsection

@section('modal')
<div id="actionModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 1000px; width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-action" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên chuyên mục <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="id_input_name" name="name" class="form-control required" data-notify="Vui lòng nhập tên chuyên mục" placeholder="Nhập tên chuyên mục">
                            <input type="hidden" id="id_input_slug" name="slug" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả chuyên mục</label>
                        <textarea id="id_textarea_description" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" id="id_input_url" name="url" class="form-control" placeholder="Nhập Url">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cấu hình hiển thị</label>
                        <div class="border-table p-5">
                        	<div class="form-group d-flex">
		                        <label class="col-sm-4 col-form-label">Kiểu hiển thị</label>
		                        <div class="col-sm-8 form-select-list">
		                        	<select class="form-control custom-select-value" id="id_select_display_method" name="display_method">
			                        	<option value="1">Kiểu hiển thị đơn tin</option>
			                        	<option value="2">Kiểu hiển thị đa tin</option>
			                        </select>
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-sm-12">
	                        		<div class="form-group row">
	                        			<div class="col-sm-6">
	                        				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	                        					<label class="col-form-label">Hiển thị</label>
	                        				</div>
	                        				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			                                    <div class="i-checks pull-left">
		                                            <input type="checkbox" name="status" value="1"> <i></i>
		                                        </div>
			                                </div>
	                        			</div>
	                        			<div class="col-sm-6">
			                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	                        					<label class="col-form-label">Bật cửa sổ mới</label>
	                        				</div>
	                        				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
			                                    <div class="i-checks pull-left">
		                                            <input type="checkbox" name="new_window" value="1"> <i></i>
		                                        </div>
			                                </div>
	                        			</div>
		                            </div>
	                        	</div>
		                    </div>
                        	<div class="row">
		                    	<div class="col-sm-12">
	                        		<div class="form-group row">
	                        			<div class="col-sm-6">
	                        				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="login2">Hiển thị menu ngang</label>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"> <input type="checkbox" type="checkbox" name="show_h_menu" value="1"> </span>
                                                    <input type="text" name="display_h_order" class="form-control" placeholder="Thứ tự">
                                                </div>
                                            </div>
	                        			</div>
	                        			<div class="col-sm-6">
	                        				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <label class="login2">Hiển thị menu dọc</label>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"> <input type="checkbox" name="show_v_menu" value="1"> </span>
                                                    <input type="text" name="display_v_order" class="form-control" placeholder="Thứ tự">
                                                </div>
                                            </div>
	                        			</div>
		                            </div>
	                        	</div>
		                    </div>
                        </div>
                    </div>
                    <input type="hidden" id="id_action_type" name="action_type" class="form-control">
                    <input type="hidden" id="id_input_id" name="id" class="form-control">
                    
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete-->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"></h5>
            </div>
            <div class="modal-body">
                <form id="form-delete">
                    <input type="hidden" name="input_id" id="id_input_id">
                    <input type="hidden" id="id_input_type_del">
                    <div class="question-to-confirm"></div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger" id="delete">Xóa</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
    @include('modules.AIArticlesCategory.javascripts')
@endsection