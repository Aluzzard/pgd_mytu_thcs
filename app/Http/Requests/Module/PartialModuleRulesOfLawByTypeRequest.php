<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class PartialModuleRulesOfLawByTypeRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:partial_module_rules_of_law_by_types,name,'.$id
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
