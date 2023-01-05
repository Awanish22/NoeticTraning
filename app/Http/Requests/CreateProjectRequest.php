<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name'=>'required',
            'clas'=>'required',
            'address'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'language'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'text'=>'required',
           
           ];
    }
}
