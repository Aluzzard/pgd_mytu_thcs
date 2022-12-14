<script src="{{ asset('assets/administration/mainstructure/js/global.js') }}"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/administration/mainstructure/js/icheck/icheck-active.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    
    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới liên hệ");
            func_formReset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa liên hệ");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id').val(p_id);
            $('#deleteModal #action_type').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa liên hệ không? ');
        }
    };

    func_formReset = function(){
        $('#form-action')[0].reset();
        $('input[name="status"]').attr('checked', false); $('input[name="status"]').parent().removeClass('checked');
    }
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AIContact.post.ajax') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AIContact.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
                $('input[name="id"]').val(data.contact.id);
                $('input[name="name"]').val(data.contact.name);
                $('input[name="numberphone"]').val(data.contact.numberphone);
                $('input[name="email"]').val(data.contact.email);
                $('textarea[name="content"]').val(data.contact.content);
                data.contact.status == 1 ? $('input[name="status"]').attr('checked', true) : $('input[name="status"]').attr('checked', false);
                data.contact.status == 1 ? $('input[name="status"]').parent().addClass('checked') : $('input[name="status"]').parent().removeClass('checked');
            },
            error: function(data) { 
                $('.modal').modal('hide');
                if (data.error == false) {
                    swal({ icon: "error", text: data.message, timer: 3000, buttons: false });
                } 
            }
        });
    };

// Modal xóa chung
/* ----------------------------------------------------------------------------------------*/
    $('#deleteModal').on('submit', function (event){
        event.preventDefault();
        $data = {
            action_type: $('#deleteModal #action_type').val(),
            id: $('#deleteModal #id').val()
        };
        $url = '{!! route('AIContact.post.ajax') !!}';
        func_callAjax($url,'data', $data,'submit');
    });


});

</script>