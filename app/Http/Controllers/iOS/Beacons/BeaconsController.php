<?php

namespace Genusshaus\Http\Controllers\iOS\Beacons;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\iOS\Beacons\GetBeaconsRequest;
use Genusshaus\Http\Resources\iOS\Beacons\BeaconsIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\BeaconsShowPostsRessource;


use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

use Illuminate\Http\Request;


class BeaconsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $beacons = Beacon::all();

        if ($beacons->count()) {

            return BeaconsIndexRessource::collection($beacons);
        }

        return response()->json([
        ], 204);
    }


    public function show(GetBeaconsRequest $request)
    {
        $beacons = Beacon::where('major', '=', $request->major)->where('minor', '=', $request->minor)->first();

        if (!$beacons->count()) {
            return response()->json([
                'message' => 'no beacon available!',

            ], 404);
        }

        return new BeaconsShowPostsRessource($beacons);
    }


    /**
    *   Google Firebase Push Notification
    */
    public function notification(Request $request)
    {
        $this->validate($request, [
            'uuid' => 'required',
            'major' => 'required|numeric|max:10',
            'minor' => 'required|numeric|max:10',
            'token' => 'required'
        ]);

        $place = null;
        $beacon = Beacon::where('major', '=', $request->major)->where('minor', '=', $request->minor)->first();

        if(!is_null($beacon))
        {
            $place = Place::find($beacon->place_id);
        }

        $data = [
            'title'     => $beacon->title,
            'body'      => $beacon->body,
            'place'     => $place
        ];

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($beacon->title);
        $notificationBuilder->setBody($beacon->body)
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();


        // hard coded token
        $token = $request->token;

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        //return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        //return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

        //return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        if($downstreamResponse->numberSuccess() == 1)
            return json_encode(['status' => 'success']);
        else
            return json_encode(['status' => "error"]);
    }
}
