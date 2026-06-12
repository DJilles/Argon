<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceTypeRequest extends FormRequest
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
            //'dev_name'=>'string|required|min:3|max:50|unique:devices_types,dev_name' .$this->route('device_type'),
            'dev_name' => 'required','string','max:50','min:3',Rule::unique('devices_types','dev_name')->ignore($this->route('device_type')),
            'dev_description'=>'string|required|min:3|max:200'
        ];
    }
}
