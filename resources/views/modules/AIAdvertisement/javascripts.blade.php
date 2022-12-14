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
            $('#actionModal .modal-title').text("Thêm mới quảng cáo");
            func_formReset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa quảng cáo");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_id').val(p_id);
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa quảng cáo');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa quảng cáo không? ');
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
        url = '{!! route('AIAdvertisement.post.ajax') !!}';
        func_callAjax(url,'formdata', data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {
        $.ajax({
            type: 'POST',
            url: '{!! route('AIAdvertisement.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
            	$('input[name="id"]').val(data.advertisement.id);
                $('input[name="name"]').val(data.advertisement.name);
                $('input[name="show_from_date"]').val(data.advertisement.show_from_date);
                $('input[name="show_to_date"]').val(data.advertisement.show_to_date);
                
                if (data.advertisement.is_active == 1) {
                	$('input[name="is_active"]').parent().addClass('checked');
        		    $('input[name="is_active"]').attr('checked', true);
                } else {
                	$('input[name="is_active"]').parent().removeClass('checked');
        		    $('input[name="is_active"]').attr('checked', false);
                } 
                
                CKEDITOR.instances['id_textarea_content'].setData(data.advertisement.content);
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
        $url = '{!! route('AIAdvertisement.post.ajax') !!}';
        func_callAjax($url,'data', $data,'submit');
    });


});

</script>