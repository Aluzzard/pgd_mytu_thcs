<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class PartialModuleSteeringDocumentOfTypeRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:partial_module_steering_document_of_types,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên loại!',
        	'name.unique'                =>'Tên loại đã tồn tại!'
        ];
    }
}
