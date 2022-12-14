<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleVideoYoutubeRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_video_youtubes,name,'.$id,
            'link'                       =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên video!',
        	'name.unique'                =>'Tên doanh nghiệp đã tồn tại!',
            'link.required'              =>'Vui lòng nhập đường dẫn video!',
        ];
    }
}
