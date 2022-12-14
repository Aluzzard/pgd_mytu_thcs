<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleContactRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required',
        	'numberphone'                =>'integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tên người liên hệ!',
            'numberphone.integer'        =>'Số điện thoại không đúng định dạng!',
        ];
    }
}
