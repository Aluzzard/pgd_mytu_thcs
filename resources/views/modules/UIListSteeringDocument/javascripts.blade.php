<script src="{{ asset('assets/guests/default/modules/UIListSteeringDocument/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/guests/default/modules/UIListSteeringDocument/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/guests/default/modules/UIListSteeringDocument/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/guests/default/modules/UIListSteeringDocument/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#data_table").DataTable({
        "responsive": true,
        "autoWidth": false,
          "language": {
              "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
              "zeroRecords": " Không tìm thấy!",
              "info": "Hiển thị _PAGE_ của _PAGES_ trang",
              "infoEmpty": "Chưa có dữ liệu!",
              "infoFiltered": "(lọc từ _MAX_ dòng)",
              "sSearch":       "Tìm:",
              "oPaginate": {
		        "sFirst":    "Đầu",
		        "sPrevious": "Trước",
		        "sNext":     "Tiếp",
		        "sLast":     "Cuối"
    			}
          },
        "order": [[ 3, "asc" ]],
        "columnDefs": [
            {
                "targets": [0,1,2],
                "visible": false,
            },
        ],
        initComplete: function () {
            this.api().columns([0,1,2]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value="">--Tất cả--</option></select>')
                .appendTo( $("#example thead tr td").eq(column.index()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            });         
        }       
    });   
});
</script>