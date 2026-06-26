<?php

return [
  'api_url' => env('MELON_API_URL', ''),

  // While the real Melon endpoint isn't ready, serve mock objects whose unit
  // numbers match the isometry shape ids (database/data/apartments-mock.json).
  // Flip MELON_MOCK=false once the live API is available.
  'mock' => (bool) env('MELON_MOCK', false),
];
