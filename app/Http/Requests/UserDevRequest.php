<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $userId = $this->route('user_dev') ?? $this->route('id') ?? $this->id;

        if (is_object($userId)){
            $userId = $userId->id;
        }

        return [
            'rol'=>'required|in:t,s,w',
            'u_name'=>'required|string|min:3|max:50',
            'surname'=>'required|string|min:3|max:50',
            'gender'=>'required|in:f,m',
            'career'=>'required|string|min:3|max:50',
            'id_num'=>[
                'required',
                'string',
                'min:3',
                'max:16',
                Rule::unique('users_devs','id_num')->ignore($userId),
            ],
            'contact_num'=>[
                'required',
                'string',
                'min:3',
                'max:14',
                Rule::unique('users_devs','contact_num')->ignore($userId),
            ],
            'address'=>'required|string|min:3|max:200',
            'check_out_date'=>'required|date|before_or_equal:now',
            'semester'=>'required|in:1,2',
            'devolution_date_due'=>[
                'required',
                'date',
                'after_or_equal:check_out_date',
                function ($attribute,$value,$fail){
                    $checkout = \Carbon\Carbon::parse($this->check_out_date);
                    $devolution = \Carbon\Carbon::parse($value);

                    if (!$devolution->isSameDay($checkout)){
                        $fail('La fecha de devolución debe ser el mismo día del préstamo.');
                    }

                    if ($devolution->hour > 18 || ($devolution->hour == 18 && $devolution->minute > 0)) {
                    $fail('La hora de devolución no puede ser posterior a las 6:00 PM.');
                }
                },
            ],
            'device_condition'=>'required|string|min:3|max:200',
            'device_inventory_id'=>'required|exists:devices_inventories,id',

        ];
    }
}
