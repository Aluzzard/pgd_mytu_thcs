<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleImageLibrariesRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_image_libraries,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'                =>'Vui lòng nhập tên thư viện ảnh!',
        	'name.unique'                =>'Tên thư viện ảnh đã tồn tại!'
        ];
    }
}
