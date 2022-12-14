<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleArticlesCategoryRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_articles_categories,name,'.$id
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên chuyên mục!',
        	'name.unique'                =>'Tên chuyên mục đã tồn tại!'
        ];
    }
}
