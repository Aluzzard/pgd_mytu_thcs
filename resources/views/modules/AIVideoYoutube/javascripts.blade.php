<!-- icheck JS
    ============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck-active.js') }}"></script>

<script src="{{ asset('assets/administration/mainstructure/js/global.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    
    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#modalVideo .modal-title').text("Thêm mới video");
            func_formReset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#modalVideo .modal-title').text("Chỉnh sửa video");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal input[name=id]').val(p_id);
            $('#deleteModal input[name=action_type]').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa video');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa video không? ');
        }
    };

    func_formReset = function(){
        $('#form-action')[0].reset();
        $('#holder').html('');
    }
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AIVideoYoutube.post.ajax') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {
        $.ajax({
            type: 'POST',
            url: '{!! route('AIVideoYoutube.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
                $('#modalVideo input[name="id"]').val(data.video.id);
                $('#modalVideo input[name="name"]').val(data.video.name);
                $('#modalVideo input[name="link"]').val(data.video.link);
                $('#modalVideo input[name="category"]').val(data.video.category);
                $('#modalVideo textarea[name="content"]').val(data.video.content);
                data.video.check_new == 1 ? $('input[name="check_new"]').attr('checked', true) : $('input[name="check_new"]').attr('checked', false);
                data.video.check_new == 1 ? $('input[name="check_new"]').parent().addClass('checked') : $('input[name="check_new"]').parent().removeClass('checked');
                data.video.check_outstanding == 1 ? $('input[name="check_outstanding"]').attr('checked', true) : $('input[name="check_outstanding"]').attr('checked', false);
                data.video.check_outstanding == 1 ? $('input[name="check_outstanding"]').parent().addClass('checked') : $('input[name="check_outstanding"]').parent().removeClass('checked');
                data.video.check_internal == 1 ? $('input[name="check_internal"]').attr('checked', true) : $('input[name="check_internal"]').attr('checked', false);
                data.video.check_internal == 1 ? $('input[name="check_internal"]').parent().addClass('checked') : $('input[name="check_internal"]').parent().removeClass('checked');
                data.video.check_active == 1 ? $('input[name="check_active"]').attr('checked', true) : $('input[name="check_active"]').attr('checked', false);
                data.video.check_active == 1 ? $('input[name="check_active"]').parent().addClass('checked') : $('input[name="check_active"]').parent().removeClass('checked');

                (data.video.show_from_date) ? $('#id_input_show_from_date').val( data.video.show_from_date.replace(" ", "T") ) 
                                            : $('#id_input_show_from_date').val('');
                        
                (data.video.show_to_date) ? $('#id_input_show_to_date').val( data.video.show_to_date.replace(" ", "T") )
                                            : $('#id_input_show_to_date').val('');
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
            $('#modalCategory .modal-body .right-col').show();
            $('#form_category')[0].reset();
            $('h4#form_category_title').html('Thêm mới chủ đề');
            $('#id_input_action_type_category').val('addCategory');
        }
        else if( action_type == 'editCategory') {
            $('#modalCategory .modal-body .right-col').show();
            func_viewCategory(id_btn);
        } else if ( action_type == 'deleteCategory') {
            $('#deleteModal input[name=id]').val(id_btn);
            $('#deleteModal input[name=action_type]').val('deleteCategory');
            $('#deleteModal .modal-header .modal-title').html('Xóa chủ đề');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa chủ đề không? ');
        } 
    }

    $('#modalCategory').on('shown.bs.modal', function () {
        $.ajax({
            type: 'POST',
            url: '{!! route('AIVideoYoutube.post.ajaxCategory') !!}',
            data: {
                action_type: 'listCategory'
            },
            dataType:'JSON',
            success: function(data) {
                $('#table_category tbody').html(data.html_category);
            },
            error: function(data) { 
            }
        });
    });
 
    //Lấy dữ liệu 1 nhóm module và đổ ra
    func_viewCategory = function(p_id_category){
        $.ajax({
            type: 'POST',
            url: '{!! route('AIVideoYoutube.post.ajaxCategory') !!}',
            data: {
                id: p_id_category,
                action_type: 'viewCategory'
            },
            dataType:'JSON',
            success: function(data) {
                $('h4#form_category_title').html('Chỉnh sửa chủ đề: <span style="color: red;">'+data.category.name+'</span>');
                $('#id_input_id_category').val(data.category.id);
                $('#id_input_name_category').val(data.category.name);
                $('#id_input_sort').val(data.category.sort);
                $('#id_input_action_type_category').val('editCategory');
            },
            error: function(data) { 
            }
        });
    }
    $("#form_category").on("submit", function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{!! route('AIVideoYoutube.post.ajaxCategory') !!}',
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if(data.error == false){
                    show_notify('success', 5000, 'Thành công', data.message); 
                    $('#table_category tbody').html(data.html_category);
                } else {
                    show_notify('error', 5000, 'Lỗi', data.message); 
                }
            },
            error: function(data) { 
            }
        });
    });
    $('#deleteModal').on('submit', function (event){
        event.preventDefault();
        if ( $('#deleteModal input[name=action_type]').val() == 'deleteCategory') {
            url = '{!! route('AIVideoYoutube.post.ajaxCategory') !!}';
        } else {
            url = '{!! route('AIVideoYoutube.post.ajax') !!}';
        }
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                action_type: $('#deleteModal input[name=action_type]').val(),
                id: $('#deleteModal input[name=id]').val()
            },
            dataType:'JSON',
            success: function(data) {
                if(data.error == false){
                    if(data.html_category){
                        $('#table_category tbody').html(data.html_category);
                        show_notify('success', 5000, 'Thành công', data.message);
                        $('#deleteModal').modal('hide');
                    } else if(data.table_html){
                        func_successAjax(data, 'submit');
                    }
                } else {
                    show_notify('error', 5000, 'Lỗi', data.message); 
                }
            },
            error: function(data) { 
            }
        });
    });


});

</script>