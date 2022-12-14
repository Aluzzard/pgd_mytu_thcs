@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý bài viết')

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
                            <h4>Danh sách bài viết</h4>
                            <div class="sparkline8-graph">
                                <div class="text-right">
                                    @if($check_add == true)
                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('add',0)" disabled><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm</span></button>
                                    @endif
                                    <!-- @if($check_edit == true)
                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('add',0)" disabled><i class="fa big-icon fa-plus"></i><span class="ml-2">Di chuyển</span></button>
                                    @endif -->
                                </div>
                                <div class="row">
                                	<div class="col-lg-2 shadow-reset overflow-auto">
                                		<div class="tree-viewer-area mg-b-15">
                                            <div class="sparkline9-list">
                                                <div class="sparkline9-graph">
                                                    <div class="adminpro-content res-tree-ov">
                                                        <div id="jstree_post">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
		                                </div>
                                	</div>
                                	<div class="col-lg-10">
                                		<div class="datatable-dashv1-list custom-datatable-overright">
		                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
		                                        <thead>
		                                            <tr>
		                                                <th data-field="status">Duyệt</th>
		                                                <th data-field="new_news">Mới</th>
		                                                <th data-field="featured_news">Nổi bật</th>
                                                        <th data-field="avatar">Ảnh đại diện</th>
		                                                <th data-field="title">Tiêu đề</th>
		                                                <th data-field="created_at">Ngày tạo</th>
		                                                <th data-field="user_id">Người tạo</th>
		                                                <th data-field="action">Hành động</th>
		                                            </tr>
		                                        </thead>
		                                        <tbody>
		                                        
		                                        </tbody>
		                                    </table>
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
    <div class="modal-dialog" style="max-width: 1700px; width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-action" enctype="multipart/form-data">
                    <input type="hidden" id="id_input_id" name="id" class="form-control">
                    <input type="hidden" id="id_input_category_id" name="category_id" class="form-control">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tiêu đề <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="id_input_title" name="title" class="form-control" placeholder="Nhập tiêu đề">
                            <input type="hidden" id="id_input_slug" name="slug" class="form-control">
                        </div>
                    </div>
                    <!-- Ảnh -->
                    <div class="form-group row">                        
                        <label class="col-sm-2 col-form-label">Ảnh bài viết</label>
                        <div class="col-sm-12 mb-3">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                        <i class="fa fa-picture-o"></i> Tải lên hình ảnh
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="avatar">
                            </div>
                            
                        </div>
                        <div id="holder" style="margin-left: 15px;margin-top:15px;max-height:100px;"></div>
                    </div>
                    <div class="form-group">
                        <label>Cấu hình hiển thị</label>
                        <div class="border-table p-5">
		                    <div class="row">
		                    	<div class="col-sm-12">
	                        		<div class="form-group row">
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label text-danger pr-3">Hiển thị</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="status" value="1"> <i></i>
	                                        </div>
	                        			</div>
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label pr-3">Cửa sổ mới</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="new_window" value="1"> <i></i>
	                                        </div>
	                        			</div>
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label pr-3">Tin mới</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="new_news" value="1"> <i></i>
	                                        </div>
	                        			</div>
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label pr-3">Tin nổi bật</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="featured_news" value="1"> <i></i>
	                                        </div>
	                        			</div>
		                            </div>
	                        	</div>
		                    </div>
                        	<div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 d-flex">
                                            <label class="col col-form-label pr-3">Ngày tạo</label>
                                            <div class="text-center">
                                                <input type="datetime-local" id="id_input_created_at" name="created_at" class="form-control" placeholder="dd/mm/yyyy">
                                                <small>(Mặc định lấy thời gian hiện tại)</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 d-flex">
                                            <label class="col col-form-label pr-3">Ngày bắt đầu hiển thị</label>
                                            <div class="text-center">
                                                <input type="datetime-local" id="id_input_show_from_date" name="show_from_date" class="form-control" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 d-flex">
                                            <label class="col col-form-label pr-3">Ngày kết thúc hiển thị</label>
                                            <div class="text-center">
                                                <input type="datetime-local" id="id_input_show_to_date" name="show_to_date" class="form-control" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
		                    	
		                    </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả </label>
                        <textarea id="id_textarea_description" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung <code>*</code></label>
                        <textarea id="id_textarea_content" name="content" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Meta Title </label>
                                <input id="id_input_meta_title" name="meta_title" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Meta Description </label>
                                <input id="id_input_meta_description" name="meta_description" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id_input_action_type" name="action_type" class="form-control">
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
    @include('modules.AIArticlesByPermission.javascripts')
@endsection