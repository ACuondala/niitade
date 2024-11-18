<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $regras=[];
        if($this->tipo_empresa_id==1){
            $regras['alvara']='required|file|mimes:pdf';
            $regras['nif']='required|file|mimes:pdf';
            $regras['diario']='required|file|mimes:pdf';
            $regras['certidão']='required|file|mimes:pdf';
        }
        return $regras;
    }
}
