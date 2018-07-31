<?php

namespace Genusshaus\Http\Controllers\iOS\Devices;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Users\Models\Device;
use Genusshaus\Http\Resources\iOS\Devices\DevicesIndexRessource;

class DevicesController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        if ($devices->count()) {

            return DevicesIndexRessource::collection($devices);
        }

        return response()->json([
        ], 204);

    }

    public function register()
    {
        $device = Device::create();

        return response()->json([
                'message'     => 'successfully registered!',
                'device_uuid' => $device->uuid,
            ], 200);
    }
}
