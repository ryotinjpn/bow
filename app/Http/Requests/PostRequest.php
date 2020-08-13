<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content'=>'required',
            'picture'=>'required|mimes:jpeg,png,jpg,gif,mp4,mov|max:5020',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'キャプションを入力してください。',
            'picture.required' => 'イメージを選択して下さい。',
            "picture.mines" => "指定された拡張子（PNG/JPG/GIF/MP4/MOV）ではありません。",
            "picture.max" => "5Ｍを超えています。",
        ];
    }
}
