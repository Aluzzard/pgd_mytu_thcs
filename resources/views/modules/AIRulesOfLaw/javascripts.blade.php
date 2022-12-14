<script src="{{ asset('assets/administration/mainstructure/js/global.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#partialModal').on('hide.bs.modal', function () {
        $('#partialModal .modal-body .right-col').css('display','none')
    });
    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới văn bản");
            $('#form-action')[0].reset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#modalVideo .modal-title').text("Chỉnh sửa văn bản");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal input[name=id]').val(p_id);
            $('#deleteModal input[name=action_type]').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa văn bản');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa văn bản không? ');
        }
        else if ( p_type == 'type') {
            $('#partialModal .modal-title').text("Loại");
            $('#partialModal #form_modal #id_modal_type').val('type');
            func_getDataTable(p_type);
        }
        else if ( p_type == 'field') {
            $('#partialModal .modal-title').text("Lĩnh vực");
            $('#partialModal #form_modal #id_modal_type').val('field');
            func_getDataTable(p_type);
        }
        else if ( p_type == 'organization') {
            $('#partialModal .modal-title').text("Cơ quan ban hành");
            $('#partialModal #form_modal #id_modal_type').val('organization');
            func_getDataTable(p_type);
        }
    };

    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AIRulesOfLaw.post.ajaxDocument') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {
        $.ajax({
            type: 'POST',
            url: '{!! route('AIRulesOfLaw.post.ajaxDocument') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
                $('#actionModal input[name="id"]').val(data.document.id);
                $('#actionModal input[name="number"]').val(data.document.number);
                $('#actionModal textarea[name="content"]').val(data.document.content);
                $('#actionModal select[name="field_id"]').val(data.document.field_id);
                $('#actionModal select[name="type_id"]').val(data.document.type_id);
                $('#actionModal select[name="organization_id"]').val(data.document.organization_id);
                $('#actionModal input[name="signor"]').val(data.document.signor);
                $('#actionModal input[name="date_issue"]').val(data.document.date_issue);
                $('#actionModal input[name="date_effect"]').val(data.document.date_effect);
                
            },
            error: function(data) { 
                $('.modal').modal('hide');
                if (data.error == false) {
                    show_notify('error', 5000, 'Lỗi', data.message); 
                } 
            }
        });
    };

// Nhóm modules
/* ----------------------------------------------------------------------------------------*/
    func_buttonModalCategoryClick = function(action_type, id_btn){
        if ( action_type == 'addCategory') {
            $('#partialModal .modal-body .right-col').show();
            var old_type = $('#partialModal #form_modal #id_modal_type').val();
            $('#form_modal')[0].reset();
            $('#partialModal #form_modal #id_modal_type').val(old_type);
            $('#partialModal #id_input_action_type').val('addCategory');
        }
        else if( action_type == 'editCategory') {
            $('#partialModal .modal-body .right-col').show();
            func_viewCategory(id_btn);
        } else if ( action_type == 'deleteCategory') {
            $('#deleteModal input[name=id]').val(id_btn);
            $('#deleteModal input[name=action_type]').val('deleteCategory');
            $('#deleteModal .modal-header .modal-title').html('Xóa');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa không? ');
        } 
    }
    func_getDataTable = function(type){
        $.ajax({
            type: 'POST',
            url: '{!! route('AIRulesOfLaw.post.ajaxPartial') !!}',
            data: {
                type: type,
                action_type: 'listCategory'
            },
            dataType:'JSON',
            success: function(data) {
                $('#table_modal tbody').html(data.html_table);
            },
            error: function(data) { 
            }
        });
    }
 
    //Lấy dữ liệu 1 nhóm module và đổ ra
    func_viewCategory = function(p_id_category){
        $.ajax({
            type: 'POST',
            url: '{!! route('AIRulesOfLaw.post.ajaxPartial') !!}',
            data: {
                type: $('#partialModal #form_modal #id_modal_type').val(),
                id: p_id_category,
                action_type: 'viewCategory'
            },
            dataType:'JSON',
            success: function(data) {
                $('#partialModal #id_input_id').val(data.data.id);
                $('#partialModal #id_input_name').val(data.data.name);
                $('#partialModal #id_input_action_type').val('editCategory');
            },
            error: function(data) { 
            }
        });
    }
    $("#form_modal").on("submit", function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{!! route('AIRulesOfLaw.post.ajaxPartial') !!}',
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if(data.error == false){
                    show_notify('success', 5000, 'Thành công', data.message); 
                    $('#table_modal tbody').html(data.html_table);
                } else if (data.error == true && data.validate == false){
                    for (var i = 0; i < data.message.length; ++i) {
                        show_notify('warning', false, 'Cảnh báo', data.message[i]);
                    }
                } else {
                    show_notify('error', false, 'Lỗi', data.message); 
                    $(".modal").modal('hide');
                }
            },
            error: function(data) { 
            }
        });
    });
    $('#deleteModal').on('submit', function (event){
        event.preventDefault();
        if( $('#deleteModal #action_type').val() == 'delete'){
            url = '{!! route('AIRulesOfLaw.post.ajaxDocument') !!}';
            type = $('#deleteModal #action_type').val()
        } else if( $('#deleteModal #action_type').val() == 'deleteCategory'){
            url = '{!! route('AIRulesOfLaw.post.ajaxPartial') !!}';
            type = $('#partialModal #id_modal_type').val();
        }
        
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                type: type,
                action_type: $('#deleteModal input[name=action_type]').val(),
                id: $('#deleteModal input[name=id]').val()
            },
            dataType:'JSON',
            success: function(data) {
                if(data.error == false){
                    show_notify('success', 5000, 'Thành công', data.message); 
                    $('#table_modal tbody').html(data.html_table);
                    $("#deleteModal.modal").modal('hide');
                } else {
                    show_notify('error', false, 'Lỗi', data.message); 
                    $("#deleteModal.modal").modal('hide');
                }
            },
            error: function(data) { 
            }
        });
    });


});

</script>