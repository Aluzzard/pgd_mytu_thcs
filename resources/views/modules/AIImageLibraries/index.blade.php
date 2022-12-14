@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý bài viết')

@section('css')
<style type="text/css">

.item-image {
    position: relative;
    display: inline-block;
    margin: 10px 20px; 
    border: 1px solid #49505740;
    border-radius: 10px; }
    .image-in-view-library {
        max-width: 100px;
        height: 100px;
        border-radius: 10px;
        object-fit: cover;
        /*box-shadow: 3px 3px #88888859;*/ }
    .item-image.selected{
        border: 4px solid #d92550; }
        .delete-image {
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
            background: #00000066;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white; }
            .disabled {
                opacity: 0.3;
            }
.information-image {
    border-left: 1px solid #ddd;
}
</style>
</style>
@endsection

@section('content')

<div class="container-fluid">
	<div class="card">
		<div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list">
                            <h4>Danh sách thư viện ảnh</h4>
                            <div class="sparkline8-graph">
                                @if($check_add == true)
                                <div class="text-right">
                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#actionLibraryModal" onclick="func_buttonClick('addLibrary',0)"><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm thư viện ảnh</span></button>
                                </div>
                                @endif
                                <div class="row">
                                	<div class="col-lg-12">
                                		<div class="datatable-dashv1-list custom-datatable-overright">
		                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
		                                        <thead>
		                                            <tr>
		                                                <th data-field="status">Tên thư viện ảnh</th>
		                                                <th data-field="new_news">Mô tả</th>
		                                                <th data-field="featured_news">Trạng thái</th>
		                                                <th data-field="action">Hành động</th>
		                                            </tr>
		                                        </thead>
		                                        <tbody>
		                                        	{!! $table_html !!}
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
<!-- Modal Library -->
<div class="modal fade" id="actionLibraryModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel">
    <div class="modal-dialog modal-xl" role="document" style="width: 70%; max-width: 1700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-action-library">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="action_type" name="action_type">
                    <div class="form-group row">
                    	<label class="col-sm-2 col-form-label">Tên thư viện ảnh <code>*</code></label>
                    	<div class="col-sm-10">
                    		<input type="text" id="name" name="name" class="col-sm-10 form-control">
                    	</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả thư viện ảnh</label>
                        <div class="col-sm-10">
                        	<textarea name="description" id="description" class="col-sm-10 form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 d-flex">
        					<label class="col-form-label pr-3">Hiển thị</label>
                            <div class="i-checks pull-left">
                                <input type="checkbox" name="status" value="1"> <i></i>
                            </div>
            			</div>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Image -->
<div class="modal fade" id="viewImagesModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel">
    <div class="modal-dialog modal-xl" role="document" style="width: 70%; max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md list-images-library"></div>
                    <div class="col-md information-image" style="display: none;">
                        <form id="form-edit-image">
                             {{ csrf_field() }}
                            <input id="id_input_id_image" type="hidden" name="id">
                            <input type="hidden" name="action_type" value="edit">
                            <div class="form-group">
                                <label class="form-label">Tên ảnh <code>*</code></label>
                                <input type="text" class="form-control" id="id_input_name_image" name="name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Thứ tự</label>
                                <input type="number" class="form-control" id="id_input_order_image" name="order">
                            </div>                          
                            <div class="form-group">
                                <label class="form-label">Mô tả</label>
                                <textarea name="description" id="id_input_description_image" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 d-flex">
                                    <label class="col-form-label pr-3">Hiển thị</label>
                                    <div class="i-checks pull-left">
                                        <input type="checkbox" name="status" value="1"> <i></i>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form id="form-add-image" enctype="multipart/form-data">
                    <input type="hidden" id="id_input_id_library" name="input_id_library">
                    <input type="hidden" name="action_type" value="add">
                    <input type="file" id="addfiles[]" name="addfiles[]" accept="image/png, image/jpg, image/jpeg" multiple>
                    <button type="submit" class="btn btn-success">Thêm ảnh</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="smallmodalLabel">Xóa Thư Mục</h4>
        </div>
        <div class="modal-body">
            <form id="form-delete">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="action_type" id="action_type">
                <p>Bạn có chắc muốn xóa thư mục? <strong id="alert"></strong> </p>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-danger">Xóa</button>
            </div>
            </form> 
        </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
	@include('modules.AIImageLibraries.javascripts')
@endsection
