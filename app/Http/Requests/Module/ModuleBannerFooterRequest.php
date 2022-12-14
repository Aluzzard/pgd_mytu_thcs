<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleBannerFooterRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_banner_footers,name,'.$id,
        	'content'					 =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tiêu đề!',
        	'name.unique'                =>'Tên tiêu đề đã tồn tại!',
        	'content.required'			 =>'Vui lòng nhập nội dung'
        ];
    }
}
