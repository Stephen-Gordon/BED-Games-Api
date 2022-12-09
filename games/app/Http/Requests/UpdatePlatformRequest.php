<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlatformRequest extends FormRequest
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
                'name' => ['required', 'min:2', 'string'],
                'platform_developer' => ['required', 'string', 'min:2', 'max:100' ],
                'description' => ['required', 'string', 'min:5', 'max:200'],
            ];
        }
        //else patch

        //sometimes means if the field is present then its required 
        //If it comes in the request then its required, if not then its not required
        else{
            return[
                'name' => ['sometimes', 'required', 'min:2', 'string'],
                'platform_developer' => ['sometimes', 'required', 'string', 'min:2', 'max:100' ],
                'description' => ['sometimes', 'required', 'string', 'min:5', 'max:200'],
            ];
        }
       
    }
}
