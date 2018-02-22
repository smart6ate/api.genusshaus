<?php

namespace Genusshaus\Http\Requests\iOS\Beacons;

use Illuminate\Foundation\Http\FormRequest;

class GetBeaconsRequest extends FormRequest
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
            'major'       => 'required|exists:beacons,major',
            'minor'       => 'required|exists:beacons,minor',
        ];
    }
}
