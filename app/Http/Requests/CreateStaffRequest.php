<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
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
             
            'id' => ['required', 'integer', 'unique:staff'],  
            'names' => 'required', 
            'last_names' => 'required', 
            'address' => 'required', 
            
            'phone_number' => 'required',  
            'position' => 'required', 
            'email' => ['required', 'email', 'unique:staff'], 

        ];
    }

    public function messages()
    {
        return [
            
            'id.unique' => 'Este Campo ya existe',  
            'id.required' => 'Este Campo es Requerido',    
            'id.integer' => 'Este Campo tiene que ser numerico',  
            
            'names.required' => 'Este Campo es Requerido',   
            'last_names.required' => 'Este Campo es Requerido',   
            
            'email.unique' => 'Este Campo ya existe',  
            
            
            'address.required' => 'Este Campo es Requerido',    
            
            'phone_number.required' => 'Este Campo es Requerido',    
            
            'position.required' => 'Este Campo es Requerido',    
            
            'email.required' => 'Este Campo es Requerido',    
            'email.unique' => 'Este Campo ya existe',
            'email.email' => 'Este Campo no es un email',

            
        ];
        
    }
}
