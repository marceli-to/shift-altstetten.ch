// SHIFT – Badenerstrasse 587/589, 8048 Zürich Altstetten
// Mapbox setup analog ZOE/Siewerdtstrasse, Standort-Marker in Braun.

const MAP_STYLE = 'mapbox://styles/marcelitoooo/ck16ms7m51nlo1cmwnqrbjuyq?optimize=true';
const CENTER = [8.4944721, 47.3850762];
const MARKER_COLOR = '#48261D'; // cocoa / braun
const MAPBOX_VERSION = 'v3.9.3';

const initMap = () => {
  const mapEl = document.getElementById('map');
  if (!mapEl || typeof mapboxgl === 'undefined') return;

  mapboxgl.accessToken = import.meta.env.VITE_MAPBOX_TOKEN;

  const zoom = parseFloat(mapEl.dataset.zoom) || 15;

  const map = new mapboxgl.Map({
    container: 'map',
    style: MAP_STYLE,
    center: CENTER,
    zoom: zoom,
  });

  map.addControl(new mapboxgl.NavigationControl());
  map.scrollZoom.disable();

  new mapboxgl.Marker({ color: MARKER_COLOR })
    .setLngLat(CENTER)
    .addTo(map);
};

const loadMap = () => {
  if (!document.getElementById('map')) return;

  const css = document.createElement('link');
  css.rel = 'stylesheet';
  css.href = `https://api.mapbox.com/mapbox-gl-js/${MAPBOX_VERSION}/mapbox-gl.css`;
  document.head.appendChild(css);

  const script = document.createElement('script');
  script.src = `https://api.mapbox.com/mapbox-gl-js/${MAPBOX_VERSION}/mapbox-gl.js`;
  script.async = true;
  script.onload = initMap;
  document.head.appendChild(script);
};

loadMap();
