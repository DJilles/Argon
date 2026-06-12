<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDevRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rol'=>'required|in:t,s,w',
            'u_name'=>'required|string|min:3|max:50',
            'surname'=>'required|string|min:3|max:50',
            'gender'=>'required|in:f,m',
            'career'=>'required|string|min:3|max:50',
            'id_num'=>'string|required|min:3|max:16|unique:users_devs,id_num' . $this->route('user_dev'),
            'contact_num'=>'string|required|min:3|max:14|unique:users_devs,contact_num' . $this->route('user_dev'),
            'address'=>'required|string|min:3|max:200',
            'check_out_date'=>'required|date|before_or_equal:now',
            'semester'=>'required|in:1,2',
            'devolution_date_due'=>'required|date|after_or_equal:check_out_date',
            'device_condition'=>'required|string|min:3|max:200',
        ];
    }
}
