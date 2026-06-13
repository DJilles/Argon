<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceInventoryRequest extends FormRequest
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
            'inv_num'=>'string|required|min:3|max:10|unique:devices_inventories,inv_num,' . $this->route('device_inventory'),
            'serial_num'=>'string|required|min:3|max:12|unique:devices_inventories,serial_num,' . $this->route('device_inventory'),
            'model'=>'string|required|min:3|max:20',
            'inv_condition'=>'string|required|min:3|max:200',
            'device_type_id'=> 'required|exists:devices_types,id',
            'brand_id'=> 'required|exists:brands,id',
        ];
    }
}
