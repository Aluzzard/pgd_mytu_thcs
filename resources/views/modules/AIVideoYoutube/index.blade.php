@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý video Youtube')

@section('css')
<style type="text/css">
    #table_category tbody tr:hover {
        background: #ddd;
        cursor: pointer; }
    #modalCategory .modal-body .right-col {
        display: none; }
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
                            <h4>Danh sách video Youtube</h4>
                            <div class="sparkline8-graph">
                                @if($check_add == true )
                                <div class="text-right">
                                    <button type="button" id="btn_add" class="btn btn-primary" data-toggle="modal" data-target="#modalCategory"><i class="fa big-icon fa-puzzle-piece"></i><span class="ml-2">Chủ đề</span></button>
                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#modalVideo" onclick="func_buttonClick('add',0)"><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm video</span></button>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
                                                <thead>
                                                    <tr>
                                                        <th data-field="check_active">Hiện</th>
                                                        <th data-field="check_outstanding">Nội bộ</th>
                                                        <th data-field="name">Tiêu đề</th>
                                                        <th data-field="link">Địa chỉ</th>
                                                        <th data-field="content">Mô tả</th>
                                                        <th data-field="created_at">Ngày tạo</th>
                                                        <th data-field="action">Thao tác</th>
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
    @include('modules.AIVideoYoutube.modalVideo')
    @include('modules.AIVideoYoutube.modalCategory')
@endsection
@section('javascript')
    @include('modules.AIVideoYoutube.javascripts')
@endsection