<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'title' => ['required', 'string'],
                'description' => ['required', 'string', 'max:250'],
                'category' => ['required', 'string'],
                'price' => ['required', 'integer'],
                'store_id' => ['required' , 'integer']
            ];
        }
        //else patch

        //sometimes means if the field is present then its required 
        //If it comes in the requssest then its required, if not then its not required
        else{
            return[
                'name' => ['sometimes', 'required' , 'string'],
                'description' => ['sometimes', 'required', 'string'],
                'category' => ['sometimes', 'required', 'string'],
                'price' => ['sometimes', 'required', 'integer'],
                'store_id' => ['sometimes', 'required', 'integer'],
            ];
        }
       
    }
}
