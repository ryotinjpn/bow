<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content'=>'required',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,mp4,mov'
        ];
    }

    public function messages(){
        return [
            'content.required'  => 'キャプションを入力してください。',
            'picture.required'=> 'イメージを選択して下さい。。',

        ];
    }
}
