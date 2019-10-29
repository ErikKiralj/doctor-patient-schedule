<?php

return [

    /*
     * The api key used when sending Geocoding requests to Google.
     */
    'key' => env('AIzaSyCg77VUq8RDh-Tq11c1eSrjI33Zh9eaPSQ', 'AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw'),

    /*
     * The language param used to set response translations for textual data.
     *
     * More info: https://developers.google.com/maps/faq#languagesupport
     */

    'language' => '',

    /*
     * The region param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/intro#RegionCodes
     */
    'region' => '',

    /*
     * The bounds param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/intro#Viewports
     */
    'bounds' => '',

];
