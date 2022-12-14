<script src="{{ asset('assets/administration/mainstructure/js/slug/slug.js') }}"></script>
<script>var route_prefix = "/admin/laravel-filemanager";</script>

<!-- CKEditor init -->
<script src="{{ asset('assets/administration/mainstructure/js/ckeditor/ckeditor.js') }}"></script>
<script>
    $('input[name=title]').on('input',function(event) {
        var title = $('input[name=title]').val();
        var slug = ChangeToSlug(title);
        $('input[name=slug]').val(slug);
    });
    var option = {
        language: 'vi',
        height: 300,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    }
    CKEDITOR.replace('id_textarea_description', option);
    CKEDITOR.replace('id_textarea_content', option);
    
</script>

<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
// $('#lfm').filemanager('file', {prefix: route_prefix});
</script>
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
    //Khi chọn node, lấy id node để hiện danh sách tin bài
    $(document).on("click", '.jstree-anchor', function(event) {
        $('#btn_add').attr('disabled', false);
        id = $(this).attr('id');
        $('#actionModal #id_input_category_id').val( id.substring(5, id.length-7 ) );
        func_chooseArticlesByCategory( id.substring(5, id.length-7 ) );
    }); //end

    //Lọc tin bài theo chuyên mục
    func_chooseArticlesByCategory = function(id){
        event.preventDefault();
        $data = {
            category_id: id,
        };
        $url = '{!! route('AIArticles.post.listArticles') !!}';
        func_callAjax($url,'data', $data,'submit');
    }; //End Lọc tin bài theo chuyên mục

    //Load cây chuyên mục
    func_LoadTree = function() {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticlesCategory.post.ajax') !!}',
            data: {
                action_type: 'treeview'
            },
            dataType:'JSON',
            success: function(data) {
                $('#jstree_post').jstree(true).settings.core.data = data.tree;
                $('#jstree_post').jstree(true).refresh();

            },
            error: function(data) { 
                func_LoadTree();
            }
        });
    };// End Load cây chuyên mục
    func_LoadTree();

    func_buttonClick = function(p_type, p_id){
        if( p_type == 'add'){
            $('#actionModal .modal-title').text("Thêm mới bài viết");
            func_formReset();
            $('#form-action #id_input_action_type').val('add');
        } 
        else if ( p_type == 'edit') {
            $('#actionModal .modal-title').text("Chỉnh sửa bài viết");
            $('#form-action #id_input_action_type').val('edit');
            func_viewArticle(p_id);
        }
        else if ( p_type == 'delete') {
            $('#deleteModal #id_input_id').val(p_id);
            $('#deleteModal #id_input_type_del').val('delete');
            $('#deleteModal .modal-header .modal-title').html('Xóa bài viết');
            $('#deleteModal .question-to-confirm').html('Bạn có chắc muốn xóa bài viết không? ');
        }
    };

    func_formReset = function(){
        temp_category_id = $('#actionModal #id_input_category_id').val();
        $('#actionModal #id_input_category_id').val(temp_category_id);
        $('#form-action')[0].reset();
        CKEDITOR.instances['id_textarea_description'].setData('');
        CKEDITOR.instances['id_textarea_content'].setData('');
        $('#holder').html('');
        $('input[name="status"]').attr('checked', false); $('input[name="status"]').parent().removeClass('checked');
        $('input[name="new_window"]').attr('checked', false); $('input[name="new_window"]').parent().removeClass('checked');
        $('input[name="new_news"]').attr('checked', false); $('input[name="new_news"]').parent().removeClass('checked');
        $('input[name="featured_news"]').attr('checked', false); $('input[name="featured_news"]').parent().removeClass('checked');
    }
    /* ------------------------------------------ Handle ------------------------------------------*/
    $("#form-action").on("submit", function( event ) {
        event.preventDefault();
        for ( instance in CKEDITOR.instances ) { //input dữ liệu ckeditor
            CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticles.post.ajax') !!}',
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data)
                func_chooseArticlesByCategory(data.category_id);
                func_successAjax(data,"submit");
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
    func_viewArticle = function(id) {     
        $.ajax({
            type: 'POST',
            url: '{!! route('AIArticles.post.ajax') !!}',
            data: {
                id: id,
                action_type: 'view'
            },
            dataType:'JSON',
            success: function(data) {
                $('#id_input_id').val(data.article.id);
                $('#id_input_category_id').val(data.article.category_id);
                $('#id_input_title').val(data.article.title);
                $('#id_input_slug').val(data.article.slug);
                if(data.article.avatar) {
                    $('#thumbnail').val(data.article.avatar);
                    $('#holder').html('<img src="'+data.article.avatar+'" style="height: 5rem;">');
                } else {
                    $('#thumbnail').val(''); $('#holder').html('');
                }

                data.article.status == 1 ? $('input[name="status"]').attr('checked', true) : $('input[name="status"]').attr('checked', false);
                data.article.status == 1 ? $('input[name="status"]').parent().addClass('checked') : $('input[name="status"]').parent().removeClass('checked');
                data.article.new_window == 1 ? $('input[name="new_window"]').attr('checked', true) : $('input[name="new_window"]').attr('checked', false);
                data.article.new_window == 1 ? $('input[name="new_window"]').parent().addClass('checked') : $('input[name="new_window"]').parent().removeClass('checked');
                data.article.new_news == 1 ? $('input[name="new_news"]').attr('checked', true) : $('input[name="new_news"]').attr('checked', false);
                data.article.new_news == 1 ? $('input[name="new_news"]').parent().addClass('checked') : $('input[name="new_news"]').parent().removeClass('checked');
                data.article.featured_news == 1 ? $('input[name="featured_news"]').attr('checked', true) : $('input[name="featured_news"]').attr('checked', false);
                data.article.featured_news == 1 ? $('input[name="featured_news"]').parent().addClass('checked') : $('input[name="featured_news"]').parent().removeClass('checked');
                
                    var date = new Date(data.article.created_at);
                    $('#id_input_created_at').val( date.getFullYear()+'-'+(date.getMonth()+1).toString().padStart(2,'0')+'-'+date.getDate().toString().padStart(2,'0')+'T'+date.getHours().toString().padStart(2,'0')+':'+date.getMinutes().toString().padStart(2,'0') );
                    if(data.article.show_from_date) $('#id_input_show_from_date').val( data.article.show_from_date.replace(" ", "T") );
                    
                    if(data.article.show_to_date) $('#id_input_show_to_date').val( data.article.show_to_date.replace(" ", "T") );

                CKEDITOR.instances['id_textarea_description'].setData(data.article.description);
                CKEDITOR.instances['id_textarea_content'].setData(data.article.content);
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
            url: '{!! route('AIArticles.post.ajax') !!}',
            data: {
                action_type: $('#deleteModal #id_input_type_del').val(),
                id: $('#deleteModal #id_input_id').val()
            },
            dataType: 'json',
            success: function(data) {
                func_chooseArticlesByCategory(data.category_id);
                $('#deleteModal').modal('hide');
                if (data.error == false) {
                    show_notify('success', 5000, 'Thành công', data.message);
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

</script>