<?php

return [
  // Objektschnittstelle: liefert ausschliesslich die Wohnungen (emonitor/Melon).
  // Die Gewerbeobjekte werden lokal gepflegt (App\Models\CommercialObject).
  'api_url' => env('MELON_API_URL', ''),

  // Mock-Fixture statt Live-API ausliefern (database/data/apartments-mock.json).
  'mock' => (bool) env('MELON_MOCK', false),

  // Interessentenformular-Hook: das Kontaktformular wird zusätzlich zum
  // Mailversand als Lead an Melon übergeben (Basic Auth, JSON POST).
  'hook' => [
    'enabled' => (bool) env('MELON_HOOK_ENABLED', false),
    'url' => env('MELON_HOOK_URL', ''),
    'username' => env('MELON_HOOK_USERNAME', ''),
    'password' => env('MELON_HOOK_PASSWORD', ''),
    'timeout' => (int) env('MELON_HOOK_TIMEOUT', 10),
  ],
];
