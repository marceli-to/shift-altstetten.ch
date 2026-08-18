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
     * Reihenfolge der Objekte innerhalb eines Geschosses, wie sie in der
     * Isometrie (resources/views/components/objects/iso.blade.php) umlaufen:
     * Start bei der Wohnung vorne links ("…1a"), dann gegen den Uhrzeigersinn
     * um den Kern. Schluessel sind die kleingeschriebenen Titel.
     *
     * Die Geschossgruppierung haengt NICHT an dieser Liste – sortiert wird
     * zuerst nach `floor_num` (siehe ApartmentController::sortByIsometry), die
     * Liste bestimmt nur die Reihenfolge innerhalb eines Geschosses.
     *
     * Hergeleitet aus den Polygon-Schwerpunkten der Isometrie; EG bis 4. OG
     * haben denselben Wohnungssatz und damit dieselbe Reihenfolge. Bei einer
     * neu gezeichneten Isometrie neu herleiten – CommercialAdminTest bzw.
     * ObjectOrderTest schlagen an, wenn Objekt und Liste auseinanderlaufen.
     */
    'order' => [
        // EG
        'b01', 'b02', 'w001a', 'w002a', 'w003b', 'w004b', 'w001b', 'w002b', 'w003a',
        // 1. OG
        'b03', 'b04', 'w101a', 'w102a', 'w103b', 'w104b', 'w101b', 'w102b', 'w103a',
        // 2. OG
        'b05', 'b06', 'w201a', 'w202a', 'w203b', 'w204b', 'w201b', 'w202b', 'w203a',
        // 3. OG
        'b07', 'b08', 'w301a', 'w302a', 'w303b', 'w304b', 'w301b', 'w302b', 'w303a',
        // 4. OG
        'b09', 'b10', 'w401a', 'w402a', 'w403b', 'w404b', 'w401b', 'w402b', 'w403a',
        // 5. OG – ohne …3b/…4b rueckt …2b an die aeussere Position
        'b11', 'b12', 'w501a', 'w502a', 'w502b', 'w501b', 'w503a',
        // Attika
        'w601a', 'w603b', 'w604b', 'w601b', 'w602b',
    ],

];
