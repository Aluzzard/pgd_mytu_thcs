<script src="{{ asset('assets/administration/mainstructure/js/global.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    
    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới thời khóa biểu");
            func_formReset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa thời khóa biểu");
            $('#form-action #id_input_action_type').val('edit');
            func_view(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_id').val(p_id);
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa thời khóa biểu');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa thời khóa biểu không? ');
        }
    };

    func_formReset = function(){
        $('#form-action')[0].reset();
        $('#holder').html('');
    }
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        $data = new FormData(this);
        $url = '{!! route('AISchoolTimetable.post.ajax') !!}';
        func_callAjax($url,'formdata', $data,'submit');
    });

    //Lấy dữ liệu 1 module và đổ ra trong edit
    func_view = function(id) {
        $.ajax({
            type: 'POST',
            url: '{!! route('AISchoolTimetable.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
                $('input[name="id"]').val(data.timetable.id);
                $('input[name="name"]').val(data.timetable.name);
                $('input[name="date"]').val(data.timetable.date);
            },
            error: function(data) { 
                $('.modal').modal('hide');
                if (data.error == false) {
                    swal({ icon: "error", text: data.message, timer: 3000, buttons: false });
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
        $url = '{!! route('AISchoolTimetable.post.ajax') !!}';
        func_callAjax($url,'data', $data,'submit');
    });


});

</script>