<?php

namespace Genusshaus\Http\Requests\iOS\Events;

use Illuminate\Foundation\Http\FormRequest;

class ShowEventsRequest extends FormRequest
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
            'device_uuid' => 'nullable|exists:devices,uuid',
            'uuid'        => 'required|exists:events,uuid',
        ];
    }
}
