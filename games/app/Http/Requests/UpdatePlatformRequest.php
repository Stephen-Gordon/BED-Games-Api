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
                'name' => ['required'],
                'platform_developer' => ['required'],
                'description' => ['required'],
            ];
        }
        //else patch

        //sometimes means if the field is present then its required 
        //If it comes in the request then its required, if not then its not required
        else{
            return[
                'name' => ['sometimes', 'required', 'max:3'],
                'platform_developer' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required'],
            ];
        }
       
    }
}
