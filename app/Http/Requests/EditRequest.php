<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'last_name' => ['required','string','max:50'],
            'first_name' => ['required','string','max:50'],
            'last_kana' => ['required','string','max:50'],
            'first_kana' => ['required','string','max:50'],
            'gender' => ['required','integer'],
            'birthday' => ['required','date'],
            'post_code' => ['required','string'],
            'pref_id' =>['required','integer'],
            'city_id' =>['required','integer'],
            'address' => ['required','string','max:80'],
            'building' => ['nullable','string','max:80'],
            'tel' => ['required','regex:/^0\d{1,3}-\d{1,4}-\d{4}$/'],
            'mobile' => ['required','regex:/^(070|080|090)-\d{4}-\d{4}$/'],
            'email' => ['required','email','string','max:50'],
            'remarks' => ['nullable','string','max:80'],
        ];
    }
}
