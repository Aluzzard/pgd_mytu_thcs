<script src="{{ asset('assets/administration/mainstructure/js/slug/slug.js') }}"></script>
<script>var route_prefix = "/admin/laravel-filemanager";</script>

<script>
    var option = {
        language: 'vi',
        height: 300,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    }
    CKEDITOR.replace('id_textarea_content', option);
    
</script>
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
            $('#actionModal .modal-title').text("Thêm mới banner footer");
            func_formReset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa banner footer");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_id').val(p_id);
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa banner footer');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa banner footer không? ');
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
        $('#holder').html('');
    }
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        for ( instance in CKEDITOR.instances ) { //input dữ liệu ckeditor
            CKEDITOR.instances[instance].updateElement();
        }
        data = new FormData(this);
        url = '{!! route('AIBannerFooter.post.ajax') !!}';
        func_callAjax(url,'formdata', data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {
        $.ajax({
            type: 'POST',
            url: '{!! route('AIBannerFooter.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
            	console.log(data)
                $('input[name="id"]').val(data.banner.id);
                $('input[name="name"]').val(data.banner.name);
                $('select[name="type"]').val(data.banner.type);
                $('input[name="show_from_date"]').val(data.banner.show_from_date);
                $('input[name="show_to_date"]').val(data.banner.show_to_date);
                
                if (data.banner.is_active == 1) {
                	$('input[name="is_active"]').parent().addClass('checked');
        		    $('input[name="is_active"]').attr('checked', true);
                } else {
                	$('input[name="is_active"]').parent().removeClass('checked');
        		    $('input[name="is_active"]').attr('checked', false);
                } 
                if (data.banner.is_default == 1) {
                	$('input[name="is_default"]').parent().addClass('checked');
        		    $('input[name="is_default"]').attr('checked', true);
                } else {
                	$('input[name="is_default"]').parent().removeClass('checked');
                    $('input[name="is_default"]').attr('checked', false);
                }
                CKEDITOR.instances['id_textarea_content'].setData(data.banner.content);
            },
            error: function(data) { 
                $('.modal').modal('hide');
                if (data.error == false) {
                    show_notify('error', false, 'Lỗi', data.message); 
                } 
            }
        });
    };
    $('#deleteModal').on('submit', function (event){
        event.preventDefault();
        $data = {
            action_type: $('#deleteModal #id_input_type_del').val(),
            id: $('#deleteModal #id_input_id').val()
        };
        $url = '{!! route('AIBannerFooter.post.ajax') !!}';
        func_callAjax($url,'data', $data,'submit');
    });


});

</script>