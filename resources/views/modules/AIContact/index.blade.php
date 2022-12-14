@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý danh sách liên hệ')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/form/form.css') }}">
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
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list">
                            <h4>Danh sách người liên hệ</h4>
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
                                                        <th data-field="name">Tên</th>
                                                        <th data-field="avatar">Số điện thoại</th>
                                                        <th data-field="status">Email</th>
                                                        <th data-field="category">Nội dung</th>
                                                        <th data-field="price">Trạng thái</th>
                                                        <th data-field="user_id">Ngày liên hệ</th>
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

<div id="actionModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 1700px; width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-action" enctype="multipart/form-data">
                    <input type="hidden" id="id_input_action_type" name="action_type" class="form-control">
                    <input type="hidden" id="id" name="id" class="form-control">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên người liên hệ <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên người liên hệ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số điện thoại </label>
                        <div class="col-sm-10">
                            <input type="text" id="numberphone" name="numberphone" class="form-control" placeholder="Nhập số điện thoại">
                        </div>
                    </div><div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email </label>
                        <div class="col-sm-10">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Nhập email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nội dung </label>
                        <div class="col-sm-10">
                            <textarea type="text" id="content" name="content" class="form-control" placeholder="Nhập nội dung"></textarea> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Đã xử lý</label>
                        <div class="i-checks pull-left">
                            <input type="checkbox" name="status" value="1"> <i></i>
                        </div>
                    </div>
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
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="action_type" id="action_type">
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
    @include('modules.AIContact.javascripts')
@endsection