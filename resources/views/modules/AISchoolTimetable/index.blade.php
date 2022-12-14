@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý thời khóa biểu')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="admin-dashone-data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list">
                            <h4>Danh sách thời khóa biểu</h4>
                            <div class="sparkline8-graph">
                                @if($check_add == true )
                                <div class="text-right">
                                    <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal" data-target="#actionModal" onclick="func_buttonClick('add',0)"><i class="fa big-icon fa-plus"></i><span class="ml-2">Thêm thời khóa biểu</span></button>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
                                                <thead>
                                                    <tr>
                                                        <th data-field="name">Tiêu đề</th>
                                                        <th data-field="date">Ngày</th>
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
                        <label class="col-sm-2 col-form-label">Tiêu đề <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày bắt đầu <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">File nén thời khóa biểu<code>*</code></label>
                        <div class="col-sm-10">
                            <input type="file" id="file" name="file" class="form-control">
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
    @include('modules.AISchoolTimetable.javascripts')
@endsection