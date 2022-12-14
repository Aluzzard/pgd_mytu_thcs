<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class PartialModuleRulesOfLawByFieldRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:partial_module_rules_of_law_by_fields,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên lĩnh vực!',
        	'name.unique'                =>'Tên lĩnh vực đã tồn tại!'
        ];
    }
}
