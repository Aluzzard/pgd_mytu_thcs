<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class ModuleSchoolTimetableRequest extends FormRequest {

    public function rules($id) {
        return [
        	'name'                       =>'required | unique:module_school_timetables,name,'.$id,
        	'date'                       =>'required',
        	'file'                       =>'required | mimes:zip'
        ];
    }
    public function rules1($id) {
        return [
        	'name'                       =>'required | unique:module_school_timetables,name,'.$id,
        	'date'                       =>'required',
        	'file'                       =>'mimes:zip'
        ];
    }

    public function messages()
    {
        return [
            'name.required'              =>'Vui lòng nhập tiêu đề thời khóa biểu!',
        	'name.unique'                =>'Thời khóa biểu đã tồn tại!',
        	'date.required'              =>'Vui lòng nhập ngày bắt đầu!',
        	'file.required'              =>'Vui lòng chọn file thời khóa biểu upload!',
        	'file.mimes'              	 =>'File tải lên phải là file dạng zip!',
        ];
    }
}
