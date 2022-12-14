<script src="{{ asset('assets/administration/mainstructure/js/global.js') }}"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck-active.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới trường");
            $('#form-action')[0].reset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa trường");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_id').val(p_id);
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa trường');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa trường không? ');
        }
    };

    func_formReset = function(){
        $('#form-action')[0].reset();
    }
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AISchools.post.ajax') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AISchools.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
            	$('input[name="id"]').val(data.link.id);
	            $('input[name="name"]').val(data.link.name);
                $('input[name="slug"]').val(data.link.slug);
	            $('input[name="sort"]').val(data.link.sort);
                $('select[name="category_id"]').val(data.link.category_id);

                data.link.is_active == 1 ? $('input[name="is_active"]').attr('checked', true) : $('input[name="is_active"]').attr('checked', false);
                data.link.is_active == 1 ? $('input[name="is_active"]').parent().addClass('checked') : $('input[name="is_active"]').parent().removeClass('checked');
            },
            error: function(data) { 
            }
        });
    };

// Modal xóa chung
/* ----------------------------------------------------------------------------------------*/
    $('#deleteModal').on('submit', function (event){
        event.preventDefault();
        $data = {
            action_type: $('#deleteModal #id_input_type_del').val(),
            id: $('#deleteModal #id_input_id').val()
        };
        $url = '{!! route('AISchools.post.ajax') !!}';
        func_callAjax($url,'data', $data,'submit');
    });


});

</script>