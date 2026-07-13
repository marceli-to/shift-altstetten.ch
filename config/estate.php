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

    /*
     * Display order of the objects, per floor, running counter-clockwise around
     * the floor as arranged in the isometry (resources/views/components/objects/
     * iso.blade.php) — NOT the alphabetical object number. Each floor starts at
     * its "…1a" apartment and loops around the core. Keys are lowercase titles.
     * Derived from the isometry geometry; regenerate if the isometry changes.
     */
    'order' => [
        'b01', 'b02', 'w001a', 'w002a', 'w003b', 'w001b', 'w002b', 'w003a', 'w004b',
        'b03', 'b04', 'w101a', 'w102a', 'w103b', 'w104b', 'w101b', 'w102b', 'w103a',
        'b05', 'b06', 'w201a', 'w202a', 'w203b', 'w201b', 'w202b', 'w203a', 'w204b',
        'b07', 'b08', 'w301a', 'w302a', 'w303b', 'w301b', 'w302b', 'w303a', 'w304b',
        'b09', 'b10', 'w401a', 'w402a', 'w403b', 'w404b', 'w401b', 'w402b', 'w403a',
        'b11', 'b12', 'w501a', 'w502a', 'w603b', 'w604b', 'w501b', 'w601b', 'w602b', 'w503a', 'w502b',
        'w601a',
    ],

];
