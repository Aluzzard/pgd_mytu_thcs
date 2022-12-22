<?php

namespace App\Http\Controllers\Modules\UIContactUs;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use Validator;

use App\Models\Modules\ModuleContacts;

class UIContactUsController extends Controller {

    public function post(Request $request) {
        $rules = [
            'name' => 'required',
            'numberphone' => 'required',
            'content' => 'required',
            'captcha' => 'required|captcha'
        ];
        $msg = [
            'name.required' => 'Vui lòng nhập họ tên!',
            'numberphone.required' => 'Vui lòng nhập số điện thoại!',
            'content.required' => 'Vui lòng nhập nội dung!',
            'captcha.required' => 'Vui lòng nhập Mã bảo vệ',
            'captcha.captcha'  => 'Sai Mã bảo vệ'
        ];
        

        $validator = Validator::make($request->all(), $rules , $msg);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            try {
                $info = new ModuleContacts;
                $info->name = $request->input('name');
                $info->numberphone = $request->input('numberphone');
                $info->email = $request->input('email');
                $info->status = 0;
                $info->content = $request->input('content');
                $info->save();
                \Session::flash('flash_success','Cảm ơn bạn đã gửi liên hệ!');
                return redirect('/lien-he');
            } catch(Exception $e) {
                \Session::flash('flash_danger','Thất bại!');
                return redirect('/lien-he');
            }
        }
    }

}
