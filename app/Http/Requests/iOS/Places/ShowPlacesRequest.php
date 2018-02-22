<?php

namespace Genusshaus\Http\Requests\iOS\Places;

use Illuminate\Foundation\Http\FormRequest;

class ShowPlacesRequest extends FormRequest
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
            'uuid'        => 'required|exists:places,uuid',
        ];
    }
}
