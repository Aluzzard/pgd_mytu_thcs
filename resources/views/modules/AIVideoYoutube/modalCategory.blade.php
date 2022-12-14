<!-- Modal chủ đề -->
<!-- ---------------------------------------------------------------------------------------- -->
<div id="modalCategory" class="modal fade" tabindex="-1" role="dialog">
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
                        <table id="table_category" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tên chủ đề</th>
                                    <th>Thứ tự</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="right-col col-sm-6">
                        <h4 id="form_category_title"></h4>
                        <form id="form_category">
                            <div class="form-group">
                                <label class="col-form-label">Tên nhóm</label>
                                <input type="hidden" id="id_input_id_category" name="id" class="form-control">
                                <input type="hidden" id="id_input_action_type_category" name="action_type" class="form-control">
                                <input type="text" id="id_input_name_category" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Thứ tự</label>
                                <input type="number" id="id_input_sort" name="sort" class="form-control">
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