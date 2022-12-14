@extends('mainstructure.layouts.admins.layout')
@section('title','Quản lý phân quyền quản lý bài viết')

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
                            <h4>Danh sách người dùng phân quyền chuyên mục bài viết</h4>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="false" data-show-toggle="true" data-resizable="false" data-cookie="false" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Chức năng</th>
                                                <th>Hành động</th>
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
        <!-- Data table area End-->
    </div>
</div>
@endsection

@section('modal')
<div id="actionModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-action" enctype="multipart/form-data">
                    <input type="hidden" id="action_type" name="action_type" class="form-control">
                    <input type="hidden" id="id" name="id" class="form-control">
                    @if($article_categories)
                        <table class="table border-table">
                            <thead class="thead-light">
                                <th>Chuyên mục</th>
                                <th>Xem</th>
                                <th>Thêm</th>
                                <th>Sửa</th>
                                <th>Xoá</th>
                            </thead>
                            <tbody>
                                @foreach($article_categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <div class="col-sm-2 i-checks pull-left">
                                            <input type="checkbox" value="view" data-id-module="{{$category->id}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-2 i-checks pull-left">
                                            <input type="checkbox" value="add" data-id-module="{{$category->id}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-2 i-checks pull-left">
                                            <input type="checkbox" value="edit" data-id-module="{{$category->id}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-2 i-checks pull-left">
                                            <input type="checkbox" value="delete" data-id-module="{{$category->id}}">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    @endif
                    <button type="submit" class="btn btn-sm btn-success">Lưu</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    @include('modules.AIArticleByMenu.javascripts')
@endsection