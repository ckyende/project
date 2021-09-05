<?php

namespace App\Http\Requests;

use App\Models\Shift;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShiftRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shift_create');
    }

    public function rules()
    {
        return [
            'shift_name' => [
                'string',
                'required',
            ],
            'time_in' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'time_out' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}