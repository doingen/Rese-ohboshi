<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'reservation_date' => 'required|date|after:today',
            'number_of_people' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'reservation_date.required' => '日付を入力してください',
            'reservation_date.after' => '明日以降の日付を入力してください',
            'number_of_people.required' => '人数を入力してください'
        ];
    }
}
