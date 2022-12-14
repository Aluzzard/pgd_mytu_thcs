<script src="{{ asset('assets/administration/mainstructure/js/slug/slug.js') }}"></script>
<!-- icheck JS
	============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck-active.js') }}"></script>
<!-- Tree Viewer JS
    ============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/tree-line/jstree.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/tree-line/jstree.active.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('input[name=name]').on('input',function(event) {
        var title = $('input[name=name]').val();
        var slug = ChangeToSlug(title);
        $('input[name=slug]').val(slug);
    });
    //Khi chọn node, lấy id node để edit
    $(document).on("click", '.jstree-anchor', function(event) { 
        id = $(this).attr('id');
        $('#actionModal #id_input_id').val( id.substring(5, id.length-7 ) );
        $('#deleteModal #id_input_id').val( id.substring(5, id.length-7 ) );
    });
    func_buttonClick = function(p_type){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới chuyên mục");
            func_resetform();
            $('#form-action #id_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa chuyên mục");
            $('#form-action #id_action_type').val('edit');
            func_viewCategory();
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa chuyên mục');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa chuyên mục không? ');
        }
    };

    function func_resetform() {
        $('#form-action')[0].reset();
        $('input[name="status"]').attr('checked', false); $('input[name="status"]').parent().removeClass('checked');
        $('input[name="new_window"]').attr('checked', false); $('input[name="new_window"]').parent().removeClass('checked');
        $('input[name="show_h_menu"]').attr('checked', false); $('input[name="show_h_menu"]').parent().removeClass('checked');
        $('input[name="show_v_menu"]').attr('checked', false); $('input[name="show_v_menu"]').parent().removeClass('checked');
    }
    func_LoadTree = function() {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticlesCategory.post.ajax') !!}',
            data: {
                action_type: 'treeview'
            },
            dataType:'JSON',
            success: function(data) {
                $('#jstree').jstree(true).settings.core.data = data.tree;
                $('#jstree').jstree(true).refresh();

            },
            error: function(data) { 
            }
        });
    };
    func_LoadTree();
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticlesCategory.post.ajax') !!}',
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                func_successAjax(data,"submit");
                func_LoadTree();
            },
            error: function(data) {
                $('.modal').modal('hide');
                if (data.error == true) {
                    show_notify('error', 5000, 'Lỗi', data.message);
                } 
            }
        });
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_viewCategory = function() {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticlesCategory.post.ajax') !!}',
            data: {
                id: $('#id_input_id').val(),
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
                $('#id_input_name').val(data.category.name);
                $('#id_input_slug').val(data.category.slug);
                $('#id_textarea_description').val(data.category.description);
                $('#id_input_url').val(data.category.url);
                $('#id_select_display_method').val(data.category.display_method);

                data.category.status == 1 ? $('input[name="status"]').attr('checked', true) : $('input[name="status"]').attr('checked', false);
                data.category.status == 1 ? $('input[name="status"]').parent().addClass('checked') : $('input[name="status"]').parent().removeClass('checked');
                data.category.new_window == 1 ? $('input[name="new_window"]').attr('checked', true) : $('input[name="new_window"]').attr('checked', false);
                data.category.new_window == 1 ? $('input[name="new_window"]').parent().addClass('checked') : $('input[name="new_window"]').parent().removeClass('checked');

                if( data.category.show_h_menu == 1){
                    $('input[name="show_h_menu"]').prop('checked', true);
                }
                else{
                    $('input[name="show_h_menu"]').prop('checked', false);
                }
                if( data.category.show_v_menu == 1){
                    $('input[name="show_v_menu"]').prop('checked', true);
                }
                else{
                    $('input[name="show_v_menu"]').prop('checked', false);
                }

                $('input[name="display_h_order"]').val(data.category.display_h_order);
                $('input[name="display_v_order"]').val(data.category.display_v_order);
            },
            error: function(data) { 
                $('.modal').modal('hide');
                if (data.error == false) {
                    show_notify('error', 5000, 'Lỗi', data.message);
                } 
            }
        });
    };

// Modal xóa chung
/* ----------------------------------------------------------------------------------------*/
    $('#deleteModal').on('submit', function (event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticlesCategory.post.ajax') !!}',
            data: {
                action_type: $('#deleteModal #id_input_type_del').val(),
                id: $('#deleteModal #id_input_id').val()
            },
            dataType: 'json',
            success: function(data) {
                if (data.error == false) {
                    func_LoadTree();
                    if(data.message){
                        show_notify('success', 5000, 'Thành công', data.message); 
                        $(".modal").modal('hide');
                    }
                } else if (data.error == true && data.validate == false){
                    for (var i = 0; i < data.message.length; ++i) {
                        show_notify('warning', false, 'Cảnh báo', data.message[i]);
                    }
                } else {
                    $(".modal").modal('hide');
                    show_notify('error', false, 'Lỗi', data.message); 
                }
            },
            error: function(data) {
                if (data.error == true) {
                    show_notify('error', 5000, 'Lỗi', data.message);
                }
            }
        });
    });
});

// Drag and drop category
/* ----------------------------------------------------------------------------------------*/
$('#jstree').on("move_node.jstree", function (e, data) {
    $.ajax({
        type: 'POST',
        url: '{!! route('AIArticlesCategory.post.ajax') !!}',
        data: {
            action_type: 'changeParent',
            id: data.node.id,
            parent: data.parent
        },
        dataType:'JSON',
        success: function(data) {
            func_successAjax(data,"");
            func_LoadTree();
        },
        error: function(data) { 
            if (data.error == true) {
                show_notify('error', 5000, 'Lỗi', data.message);
            } 
        }
    });
}); 
</script>