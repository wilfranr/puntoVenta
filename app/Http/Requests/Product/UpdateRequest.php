<?php

namespace App\Http\Requests\Product;

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
            'name'=>'string|required|unique:products, name,'.$this->route('product')->id.'|max:255',
            'image'=>'required|dimensions:min_width=100,min_height=200',
            'sell_price'=>'required',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Sólo se permite 50 caracteres',
            'name.unique' => 'El producto ya existe',

            'image.required'=>'Este campo es requerido',
            'image.dimensions'=> 'Solo se permiten imágenes de 100*200px',
            
            'sell_price.required'=>'Este campo es requerido',

            'category_id.integer'=>'El valor tiene que ser de tipo entero',
            'category_id.required'=> 'Este campo es requerido',
            'category_id.exists'=> 'La categoria no existe',
            
            'product_id.integer'=>'El valor tiene que ser de tipo entero',
            'product_id.required'=> 'Este campo es requerido',
            'product_id.exists'=> 'El proveedor no existe',



        ];
    }
}
