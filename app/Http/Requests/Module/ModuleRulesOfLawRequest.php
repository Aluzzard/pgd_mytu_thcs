<?php
namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRulesOfLawRequest extends FormRequest {

    public function rules($id) {
        return [
        	'number'                       =>'required | unique:module_rules_of_laws,number,'.$id,
        	'content'					   =>'required',
        	'date_effect'				   =>'required',
        	'file'				   		   =>'required | mimetypes:application/pdf, application/msword'
        ];
    }
    public function rules2($id) {
        return [
        	'number'                       =>'required | unique:module_rules_of_laws,number,'.$id,
        	'content'					   =>'required',
        	'date_effect'				   =>'required',
        ];
    }

    public function messages() {
        return [
            'number.required'              =>'Vui lòng nhập số hiệu!',
        	'number.unique'                =>'Số hiệu đã tồn tại!',
        	'content.required'			   =>'Vui lòng nhập trích yếu!',
        	'date_effect.required'         =>'Vui lòng nhập ngày có hiệu lực!',
        	'file.required'                =>'Vui lòng chọn file văn bản!',
        	'file.mimes'                   =>'File tải lên là phải word hoặc pdf!',
        ];
    }
}
