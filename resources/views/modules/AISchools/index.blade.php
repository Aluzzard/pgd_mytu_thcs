@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý danh sách trường')

@section('css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list">
                            <h4>Danh sách trường</h4>
                            <div class="sparkline8-graph">
                            	<div class="text-right">
                                    @if($check_add == true)
                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('add',0)"><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm</span></button>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
                                                <thead>
                                                    <tr>
                                                        <th data-field="order">Thứ tự hiển thị</th>
                                                    	<th data-field="name">Tên trường</th>
                                                        <th data-field="link">Đường dẫn</th>
                                                        <th data-field="category_id">Loại</th>
                                                        <th data-field="status">Trạng thái</th>
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
<div id="actionModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Nhóm các module</h5>
            </div>
            <div class="modal-body">
                <form id="form-action" enctype="multipart/form-data">
                    <input type="hidden" id="id_input_id" name="id" class="form-control">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên trường <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="id_input_name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Loại </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_input_category_id" name="category_id">
                                <option value="1"> Trường mầm non</option>
                                <option value="2"> Trường tiểu học</option>
                                <option value="3"> Trường trung học cơ sở</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Liên kết</label>
                        <div class="col-sm-10">
                            <input type="text" id="id_input_slug" name="slug" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Thứ tự</label>
                        <div class="col-sm-10">
                            <input type="number" id="id_input_sort" name="sort" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 d-flex">
                            <label class="col-form-label text-danger pr-3">Hiển thị</label>
                            <div class="i-checks pull-left">
                                <input type="checkbox" name="is_active" value="1" checked> <i></i>
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
                    <input type="hidden" name="id" id="id_input_id">
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
    @include('modules.AISchools.javascripts')
@endsection