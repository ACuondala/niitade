<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname'=>['required', 'string', 'max:15', 'min:3'],
            'lastname'=>['required', 'string', 'max:15', 'min:3'],
            'phone'=>['required','integer','unique:users'],
            'dob'=> ['required', 'date', 'before:-14 years'],
            'password'=>['required'],
            'confirm'=>['same:password'],
            'otherphone'=>['required','integer'],
            'images'=>['mimes:png,jpg']
            //'email',
            /*'gender'=>['required'],
            'dob'=> ['required', 'date', 'before:-18 years'],
            'password'=>['required'],
            'confirm'=>['same:password'],
            'otherphone'=>['required','integer', 'max:9','unique:users'],
            //'terms'=>['accepted'],
            'images'=>['mimes:png,jpg'],*/

        ];
    }
}
