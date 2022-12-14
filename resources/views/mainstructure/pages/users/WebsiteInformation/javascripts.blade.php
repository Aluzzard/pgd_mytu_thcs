<script>var route_prefix = "/admin/laravel-filemanager";</script>
<script>
    CKEDITOR.replace('id_textarea_custom_footer', option);
    var option = {
        language: 'vi',
        height: 300,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    }
    
</script>

<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
// $('#lfm').filemanager('file', {prefix: route_prefix});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#modal_1").on('show.bs.modal', function (e) {  
        data = {
            action_type : 'view_website_information'
        };
        url = '{!! route('admin.website.information.ajax') !!}';
        func_callAjax(url,'data', data,'view');
    });
    $("#form-action-information").on("submit", function( event ) {
        event.preventDefault();
        for ( instance in CKEDITOR.instances ) { //input dữ liệu ckeditor
            CKEDITOR.instances[instance].updateElement();
        }
        data = new FormData(this);
        url = '{!! route('admin.website.information.ajax') !!}';
        func_callAjax(url,'formdata', data,'submit');
    });
    reload_html = function (data) {
        $('#span_name').text(data.reload_html.name);
        $('#span_address').text(data.reload_html.address);
        $('#span_fax').text(data.reload_html.fax);
        $('#span_numberphone').text(data.reload_html.numberphone);
        $('#span_email').text(data.reload_html.email);
        $('#span_hotline').text(data.reload_html.hotline);
        $('#span_bussiness_code').text(data.reload_html.bussiness_code);
        $('#span_custom_footer').html(data.reload_html.custom_footer);
        $('#logo').attr('src',data.reload_html.logo);

        $('#id_div_gradient').attr('style','background: '+data.reload_html.color_gradient);
        $('#id_div_background').attr('style','background: '+data.reload_html.color_background);
        $('#id_div_font_color').attr('style','background: '+data.reload_html.color_font);
        $('#id_div_font_color_hover').attr('style','background: '+data.reload_html.color_font_hover);
        $('#id_div_font_color_focus').attr('style','background: '+data.reload_html.color_font_focus);
        
        $('#span_meta_title').text(data.reload_html.meta_title);
        $('#span_meta_description').text(data.reload_html.meta_description);
        $('#span_keywords').text(data.reload_html.keywords);
        $('#span_author').text(data.reload_html.author);
        $('#span_country').text(data.reload_html.country);
        $('#span_DC_title').text(data.reload_html.meta_dc_title);
        $('#span_meta_geo_region').text(data.reload_html.meta_geo_region);
        $('#span_meta_geo_placename').text(data.reload_html.meta_geo_placename);
        $('#span_meta_geo_position').text(data.reload_html.meta_geo_position);
        $('#span_ICBM').text(data.reload_html.meta_icbm);
    }
});

</script>