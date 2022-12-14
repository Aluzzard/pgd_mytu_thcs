<!-- icheck JS
	============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck-active.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#input_status_library').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    /* ------------------------------------------ Declare interface ------------------------------------------ */
    func_buttonClick = function(p_type, p_idbtn){
        if( p_type == 'viewLibrary' ){
            $('#viewImagesModal #modal-title').text('Danh sách ảnh thư viện ảnh');
            $('.list-images-library').removeClass('col-md-8');
            $('.information-image').hide();
            func_valImagesLibrary(p_idbtn);
            $('#id_input_id_library').val(p_idbtn);
        }
        if( p_type == 'addLibrary' ){
            func_resetform();
            $('#actionLibraryModal #modal-title').text('Thêm mới thư viện ảnh');
            $('#actionLibraryModal #action_type').val('add');
        } else if( p_type == 'editLibrary' ){
            $('#actionLibraryModal #modal-title').text('Chỉnh sửa thư viện ảnh');
            $('#actionLibraryModal #action_type').val('edit');
            func_valDataModal(p_idbtn);
        } else if( p_type == 'deleteLibrary' ){
            $('#deleteModal #id').val(p_idbtn);
            $('#deleteModal #action_type').val('delete');
        }
        
    };
    function func_resetform(){
        $('#form-action-library')[0].reset();
        $('#actionLibraryModal input[name="status"]').attr('checked', false); 
        $('#actionLibraryModal input[name="status"]').parent().removeClass('checked');
    }
    // /* ------------------------------------------ Function Library ------------------------------------------ */
    $('#form-action-library').on('submit', function (event) {
        event.preventDefault();
        if ( func_checkValidate() == true ) {
            $data = new FormData(this);
            $url = '{!! route('AIImageLibraries.post.ajaxLibrary') !!}';
            func_callAjax($url,'formdata', $data,'submit');
        }
    });
    func_valDataModal = function(p_idbtn) {
        $.ajax({
            type: 'POST',
            url: '{!! route('AIImageLibraries.post.ajaxLibrary') !!}',
            data: {
                id: p_idbtn,
                action_type: 'view'
            },
            dataType: 'json',
            success: function(data) {
                $('#actionLibraryModal #id').val(data.library.id);
                $('#actionLibraryModal #name').val(data.library.name);
                $('#actionLibraryModal #description').val(data.library.description);
                data.library.status == 1 ? $('#actionLibraryModal input[name="status"]').attr('checked', true) : $('#actionLibraryModal input[name="status"]').attr('checked', false);
                data.library.status == 1 ? $('#actionLibraryModal input[name="status"]').parent().addClass('checked') : $('#actionLibraryModal input[name="status"]').parent().removeClass('checked');
            },
            error: function(data) {
            }
        });
    };
    $('#form-delete').on('submit', function (event){
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AIImageLibraries.post.ajaxLibrary') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });
    // /* ------------------------------------------ Function Image ------------------------------------------ */
    $('#form-add-image').on('submit', function(){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{!! route('AIImageLibraries.post.ajaxImageLibrary') !!}',
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if(data.error == false){
                    show_notify('success', 5000, 'Thành công', data.message); 
                } else {
                    show_notify('error', 5000, 'Lỗi', data.message); 
                }
                $('.list-images-library').html(data.html);
            },
            error: function(data) {
                show_notify('error', 5000, 'Lỗi', data.message); 
                $('#delModal .close').click();
            }
        });
    });
    //Function get information image after click choose image
    func_getInformationImage = function(p_id_image) {
        $('.list-images-library').addClass('col-md-8');
        $('.information-image').addClass('col-md-4');
        $('.item-image.selected').removeClass('selected'); $('#image_'+p_id_image).parent().addClass('selected');
        $('.information-image').show();
        $('#id_input_id_image').val(p_id_image);
        
        $.ajax({
            type: 'POST',
            url: '{!! route('AIImageLibraries.post.ajaxImageLibrary') !!}',
            data: {
                action_type: 'image',
                id: p_id_image
            },
            dataType:'JSON',
            success: function(data) {
                $('#id_input_description_image').val(data.image.description);
                $('#id_input_name_image').val(data.image.name);
                $('#id_input_order_image').val(data.image.order);
                data.image.status == 1 ? $('#viewImagesModal input[name="status"]').attr('checked', true) : $('#viewImagesModal input[name="status"]').attr('checked', false);
                data.image.status == 1 ? $('#viewImagesModal input[name="status"]').parent().addClass('checked') : $('#viewImagesModal input[name="status"]').parent().removeClass('checked');
            },
            error: function(data) {
                show_notify('error', 5000, 'Lỗi', data.message); 
                $('#delModal .close').click();
            }
        });
    }
    // Function edit image
    $('#form-edit-image').on('submit', function(){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{!! route('AIImageLibraries.post.ajaxImageLibrary') !!}',
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data)
                if(data.error == false){
                    show_notify('success', 5000, 'Thành công', data.message); 
                } else {
                    show_notify('error', 5000, 'Lỗi', data.message); 
                }
                $('.list-images-library').html(data.html);
            },
            error: function(data) {
                show_notify('error', 5000, 'Lỗi', data.message);
                $('#delModal .close').click();
            }
        });
    });
    func_valImagesLibrary = function(p_idbtn){
        $.ajax({
            type: 'POST',
            url: '{!! route('AIImageLibraries.post.ajaxImageLibrary') !!}',
            data: {
                id: p_idbtn,
                action_type: 'list'
            },
            dataType: 'json',
            success: function(data) {
                $('.list-images-library').html(data.html)
            },
            error: function(data) {
            }
        });
    }
    func_deleteImageInLibrary = function(p_id_image){
        $.ajax({
            type: 'POST',
            url: '{!! route('AIImageLibraries.post.ajaxImageLibrary') !!}',
            data: {
                action_type: 'delete',
                id: p_id_image
            },
            dataType: 'json',
            success: function(data) {
                if(data.error == false){
                    show_notify('success', 5000, 'Thành công', data.message); 
                } else {
                    show_notify('error', 5000, 'Lỗi', data.message); 
                }
                $('.list-images-library').html(data.html);
            },
            error: function(data) {
                show_notify('error', 5000, 'Lỗi', data.message); 
                $('#delModal .close').click();
            }
        });
    }
});
</script>