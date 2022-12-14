<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleArticlesRequest extends FormRequest {

    public function rules($id) {
        return [
        	'title'                       =>'required | unique:module_articles,title,'.$id,
            'content'                     =>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'              =>'Vui lòng nhập tiêu đề!',
        	'title.unique'                =>'Tên tiêu đề đã tồn tại!',
            'content.required'            =>'Vui lòng nhập nội dung!'
        ];
    }
}
