<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=> 'required|string|max:255',
            'email'=> 'nullable|email|string|max:200',
            'provider_id'=> 'required|string|unique:providers, provider_id,'. $this->route('provider')->id.'max:12',
            'address'=> 'nullable|string|max:255', 
            'phone'=> 'nullable|string|unique:providers'. $this->route('provider')->id.'max:14',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Sólo se permite 255 caracteres',
            
            'email.email'=>'No es una dirección váilda',
            'email.string'=>'El valor no es correcto',
            'email.max'=>'Sólo se permite 255 caracteres',
            'email.unique'=>'Este Email ya se encuentra registrado',
            
            'provider_id.required'=>'Este campo es requerido',
            'provider_id.string'=>'El valor no es correcto',
            'provider_id.max'=>'Sólo se permite 12 caracteres',
            'provider_id.unique'=>'Este id ya se encuentra registrado',
            
            'address.string'=>'El valor no es correcto',
            'address.max'=>'Sólo se permite 255 caracteres',
            
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Sólo se permite 14 caracteres',
            'phone.unique'=>'Este teléfono ya se encuentra registrado',
        ];
    }
}
