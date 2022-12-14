<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class PartialModuleSteeringDocumentIssuedByOrganizationsRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:partial_module_steering_document_issued_by_organizations,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên cơ quan ban hành!',
        	'name.unique'                =>'Tên cơ quan ban hành đã tồn tại!'
        ];
    }
}
