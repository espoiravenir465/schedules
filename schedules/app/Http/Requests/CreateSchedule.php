<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSchedule extends FormRequest
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
            'title' => 'required|max:100',
            'go_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:today',


        ];
    }
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'go_date' => '出発日',
            'return_date'=>'帰宅日'
        ];
    }

    public function messages()
    {
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}

