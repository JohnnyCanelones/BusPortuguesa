<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
             
            'nombre_producto' => 'required',  
            'compatibilidad' => 'required', 
            'cantidad' => 'required', 
            'limite' => 'required', 
            'ubicacion' => 'required',  
            
        ];
    }

     public function messages()
    {
        return [
            
            'nombre_producto.required' => 'Este Campo es Requerido',    
            'compatibilidad.required' => 'Este Campo es Requerido',   
            'cantidad.required' => 'Este Campo es Requerido',    
            'limite.required' => 'Este Campo es Requerido',    
            'ubicacion.required' => 'Este Campo es Requerido',    

            
        ];
        
    }
}
