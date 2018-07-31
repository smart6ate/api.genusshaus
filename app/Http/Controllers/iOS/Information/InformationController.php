<?php

namespace Genusshaus\Http\Controllers\iOS\Information;

use Genusshaus\App\Controllers\Controller;

class InformationController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return response()->json([
            'image'         => 'https://ucarecdn.com/ec91be7f-9b4b-4b04-adcf-bc95f92f72fe/-/preview/-/progressive/yes/-/resize/800/-/enhance/20/-/sharp/10/-/quality/lightest/',
            'imprint'       => 'https://dev.genusshaus.ch/de/impressum',
            'terms'         => 'https://dev.genusshaus.ch/de/geschaeftsbedingungen',
            'privacy'       => 'https://dev.genusshaus.ch/de/datenschutz',
            'participate'   => 'https://dev.genusshaus.ch/de/kontakt',
            'contact_web'   => 'https://dev.genusshaus.ch',
            'contact_email' => 'kontakt@genusshaus.ch',
            'contact_phone' => '0041795344051',
            'last_updated'  => '2018-02-20 03:38:10',

        ], 200);
    }
}
