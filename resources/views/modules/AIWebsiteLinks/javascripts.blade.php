<script>var route_prefix = "/admin/laravel-filemanager";</script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
// $('#lfm').filemanager('file', {prefix: route_prefix});
</script>
<script src="{{ asset('assets/administration/mainstructure/js/global.js') }}"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck-active.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    
    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới Liên kết website");
            $('#form-action')[0].reset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa Liên kết website");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_id').val(p_id);
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa Liên kết website');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa Liên kết website không? ');
        }
        else if( p_type == 'images' ){
            $('.form-image .id_input_product_id').val(p_id);
            $('#imagesModal #modal-title').text('Danh sách ảnh thư viện ảnh');
            $('.list-images-library').removeClass('col-md-8');
            $('.information-image').hide();
            func_valImagesProduct(p_id);
        }
    };

    func_formReset = function(){
        $('#form-action')[0].reset();
    }
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AIWebsiteLinks.post.ajax') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AIWebsiteLinks.post.ajax') !!}',
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
                $('input[name="avatar"]').val(data.link.avatar);
	            if(data.link.avatar) {
                    $('#holder').html('<img src="'+data.link.avatar+'" style="height: 5rem;">');
                } else $('#holder').html('');
                data.link.status == 1 ? $('input[name="status"]').attr('checked', true) : $('input[name="status"]').attr('checked', false);
                data.link.status == 1 ? $('input[name="status"]').parent().addClass('checked') : $('input[name="status"]').parent().removeClass('checked');
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
        $url = '{!! route('AIWebsiteLinks.post.ajax') !!}';
        func_callAjax($url,'data', $data,'submit');
    });


});

</script>