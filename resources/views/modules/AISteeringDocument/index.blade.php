@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý văn bản điều hành')
@section('css')
<style type="text/css">
    #table_modal tbody tr:hover {
        background: #ddd;
        cursor: pointer; }
    #partialModal .modal-body .right-col {
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
                            <h4>Danh sách văn bản điều hành</h4>
                            <div class="sparkline8-graph">
                                @if($check_add == true )
                                <div class="d-flex" style="justify-content: space-between;">
                                	<div>
	                                    <button type="button" id="btn_add" class="btn btn-primary" data-toggle="modal" data-target="#partialModal" onclick="func_buttonClick('field',0)"><span>Lĩnh vực</span></button>
	                                    <button type="button" id="btn_add" class="btn btn-primary" data-toggle="modal" data-target="#partialModal" onclick="func_buttonClick('type',0)"><span>Loại</span></button>
	                                    <button type="button" id="btn_add" class="btn btn-primary" data-toggle="modal" data-target="#partialModal" onclick="func_buttonClick('organization',0)"><span>Cơ quan ban hành</span></button>
	                                </div>
	                                <div>
	                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('add',0)"><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm văn bản</span></button>
	                                </div>
                                </div>
                                
                                @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Số hiệu</th>
                                                        <th>Trích yếu</th>
                                                        <th>Ngày ký</th>
                                                        <th>Ngày có hiệu lực</th>
                                                        <th>Loại văn bản</th>
                                                        <th>Cơ quan ban hành</th>
                                                        <th>Thao tác</th>
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
	@include('modules.AISteeringDocument.modal')
@endsection
@section('javascript')
    @include('modules.AISteeringDocument.javascripts')
@endsection