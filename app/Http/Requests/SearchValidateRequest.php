<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchValidateRequest extends FormRequest
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
            'last_kana' => ['string','max:50','nullable'],
            'first_kana' => ['string','max:50','nullable'],
            'gender' => ['integer'],
            'pref_id' =>['integer'],
        ];
    }
}
