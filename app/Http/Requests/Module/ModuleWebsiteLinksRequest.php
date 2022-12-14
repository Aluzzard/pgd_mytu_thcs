<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleWebsiteLinksRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_website_links,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên liên kết!',
        	'name.unique'                =>'Tên liên kết đã tồn tại!'
        ];
    }
}
