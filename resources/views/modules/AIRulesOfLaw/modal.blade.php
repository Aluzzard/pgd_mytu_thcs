<div id="actionModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 1700px; width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-action" enctype="multipart/form-data">
                    <input type="hidden" id="id_input_id" name="id" class="form-control">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Số hiệu văn bản <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" name="number" class="form-control" placeholder="Nhập số hiệu văn bản">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Trích yếu <code>*</code></label>
                        <div class="col-sm-10">
                            <textarea type="text" name="content" class="form-control" placeholder="Nhập trích yếu"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lĩnh vực <code>*</code></label>
                        <div class="col-sm-10">
                            <select name="field_id" class="form-control">
                                @foreach($fields as $field)
                                <option value="{{$field->id}}">{{$field->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Loại <code>*</code></label>
                        <div class="col-sm-10">
                            <select name="type_id" class="form-control">
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cơ quan ban hành <code>*</code></label>
                        <div class="col-sm-10">
                            <select name="organization_id" class="form-control">
                                @foreach($organizations as $organization)
                                <option value="{{$organization->id}}">{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Người ký</label>
                        <div class="col-sm-10">
                            <input type="text" name="signor" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày ký</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_issue" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ngày có hiệu lực <code>*</code></label>
                        <div class="col-sm-10">
                            <input type="date" name="date_effect" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">File văn bản</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" class="form-control">
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
<div id="partialModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Danh sách chủ đề</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div align="right">
                            <button type="button" class="btn btn-success" onclick="func_buttonModalCategoryClick(`addCategory`,0)">Thêm</button>
                        </div>
                        <table id="table_modal" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tên chủ đề</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="right-col col-sm-6">
                        <h4 id="form_modal_title"></h4>
                        <form id="form_modal">
                            <div class="form-group">
                                <label class="col-form-label">Tên</label>
                                <input type="hidden" id="id_input_id" name="id" class="form-control">
                                <input type="hidden" id="id_input_action_type" name="action_type" class="form-control">
                                <input type="hidden" id="id_modal_type" name="type" class="form-control">
                                <input type="text" id="id_input_name" name="name" class="form-control">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
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