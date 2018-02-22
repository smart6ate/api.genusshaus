<?php

namespace Genusshaus\Http\Controllers\iOS\Devices;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\Device;
use Genusshaus\Http\Requests\iOS\Devices\UpdatePushTokensRequest;

class PushTokensController extends Controller
{
    public function __construct()
    {
    }

    public function update(UpdatePushTokensRequest $request)
    {
        $device = Device::where('uuid', '=', $request->device_uuid)->first();
        $device->push_token = $request->token;

        $device->save();

        return response()->json([
            'message' => 'successfully updated!',
        ], 200);
    }
}
