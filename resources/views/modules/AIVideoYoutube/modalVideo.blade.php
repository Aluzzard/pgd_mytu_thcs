<div id="modalVideo" class="modal fade" role="dialog">
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
                        <label class="col-sm-2 col-form-label">Tên video <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên video">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Địa chỉ video youtube <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" id="link" name="link" class="form-control" placeholder="Nhập địa chỉ video youtube">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Chủ đề</label>
                        <div class="col-sm-10">
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="content" class="form-control" rows="3"></textarea>
                        </div>
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
	                                            <input type="checkbox" name="check_active" value="1"> <i></i>
	                                        </div>
	                        			</div>
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label pr-3">Mới</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="check_new" value="1"> <i></i>
	                                        </div>
	                        			</div>
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label pr-3">Nổi bật</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="check_outstanding" value="1"> <i></i>
	                                        </div>
	                        			</div>
	                        			<div class="col-sm-3 d-flex">
                        					<label class="col-form-label pr-3">Video nội bộ</label>
		                                    <div class="i-checks pull-left">
	                                            <input type="checkbox" name="check_internal" value="1"> <i></i>
	                                        </div>
	                        			</div>
		                            </div>
	                        	</div>
		                    </div>
                        	<div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-sm-6 d-flex">
                                            <label class="col col-form-label pr-3">Ngày bắt đầu hiển thị</label>
                                            <div class="text-center">
                                                <input type="datetime-local" id="id_input_show_from_date" name="show_from_date" class="form-control" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-flex">
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
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Đóng</button>
                </form>
            </div>
        </div>
    </div>
</div>
