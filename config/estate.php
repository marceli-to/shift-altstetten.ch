<?php

return [

    'flatfox' => [
        'api_uri' => env('FLATFOX_API_URI'),
    ],

    'addresses' => [
        '21' => 'Pappelstrasse 2',
        '22' => 'Pappelstrasse 4',
    ],

    'labels' => [
        'floors' => [
            1 => '1. OG',
            2 => '2. OG',
            3 => '3. OG',
            4 => '4. OG',
            5 => '5. OG',
            6 => '6. OG',
            7 => '7. OG',
        ],
        'states' => [
            'free' => 'frei',
            'reserved' => 'reserviert',
            'taken' => 'vermietet',
        ],
    ],

    'filters' => [
        'availability' => ['NULL' => 'Alle Wohnungen', 'free' => 'Verfügbar', 'reserved' => 'Reserviert', 'rented' => 'Vermietet'],
        'rooms' => ['default' => 'Alle Zimmer'],
        'floors' => ['default' => 'Alle Etagen'],
    ],

];
