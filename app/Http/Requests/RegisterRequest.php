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
            'phone'=>['required','integer','unique:users','digits:9'],
            'dob'=> ['required', 'date', 'before:14'],
            'password'=>['required'],
            'confirm'=>['same:password'],
            'otherphone'=>['required','integer','digits:9'],
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

    public function messages(){
        return [
            'dob.before'=>'Idade minima: 14 anos',
            'password.required'=>'campo obrigatório',
            'confirm.same'=>'Password diferentes',
            'phone.unique'=>'Este número já existe',
            'phone.digits'=>'numero de telefone incorrecto',
            'otherPhone.digits'=>'numero de telefone incorrecto',
        ];
    }
}
