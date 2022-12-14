<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleSchoolsRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_schools,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên trường!',
        	'name.unique'                =>'Tên trường đã tồn tại!'
        ];
    }
}
