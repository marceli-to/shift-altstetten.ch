# TODO – Client Feedback (Stand 2026-06-24)

Quelle: `.data/readme.txt`, `.data/data/` (Texte, Bilder, Screenshots).

---

## Allgemein (alle Viewports)

### 1. Mapbox bei «Lage» hinzufügen ✅
- [x] `resources/js/modules/maps.js` (analog ZOE: gleicher Style, NavigationControl, scrollZoom aus, mapbox-gl v3 per CDN, Token aus `VITE_MAPBOX_TOKEN`).
- [x] Standort-Marker in **Braun** (`#48261D`) via `mapboxgl.Marker({ color })`.
- [x] Koordinaten Badenerstrasse 587/589: `[8.4944721, 47.3850762]` (Nominatim-Geocoding).
- [x] `#map`-Section unten auf der Lage-Seite (`pages/location.blade.php`), Import in `app.js`.
- [x] Build geprüft: Token + Style im Bundle vorhanden.

### 2. Neuer Menüpunkt / Section «Facts» nach «Lage» ✅
- [x] Route `/facts` nach `/lage` (`routes/web.php`).
- [x] Menüpunkt «Facts» nach «Lage» (Desktop + Mobile Wrapper).
- [x] Accordion-Komponenten (Blade + Alpine, grid-rows-Collapse, ohne Plugin): `components/accordion/{wrapper,item,button,content}.blade.php`.
- [x] Seite `pages/facts.blade.php` mit Inhalt aus docx (Angebot, Adresse, Bezugstermin, Erstvermietung, Bewirtschaftung, Kündigungsfristen, Mietzinsdepot, Besichtigungen, Bewerbung) – **ohne Bild**.
- [x] Bezugstermin auf «voraussichtlich 1. Mai 2027» korrigiert (entspricht «Bis Mai 2027»).
- [x] Assets gebaut (`npm run build`) – grid-rows-Klassen im CSS vorhanden.
- ⚠️ Offen: «Downloadbereich»-Verweis (Bewerbung) noch ohne Link, da kein Download-Bereich existiert.

### 3. Pfeile in den Bildern (Galerie) grösser ✅
- [x] Nur Icon vergrössert: `w-16` → `w-18` (Button bleibt `w-36 h-36`), next + prev.
- Dateien: `resources/views/components/swiper/buttons/next.blade.php`, `.../prev.blade.php`.

### 4. Zeilenumbrüche im Text «Angebot Wohnen» setzen ✅
- [x] Umbrüche gemäss roter Markierung in `.data/Screenshot 2026-06-23 at 16.43.13.png` setzen.
- Ort: `resources/views/pages/living.blade.php:65`.
- Gewünschte Umbrüche (nach den rot markierten Stellen):
  - … Unten das echte Loft – weit, offen, beeindruckend. **⏎**
  - Weiter oben eine ruhigere, fein proportionierte Wohnqualität. **⏎**
  - Und ganz oben: ein Wohnerlebnis über den Dächern der Stadt.

### 5. Neue Bilder «Kunst am Bau» ✅
- [x] 07/08/09 konvertiert (jpg/webp/avif, 960×656) → `public/img/shift-bild-kunst-am-bau-07|08|09.*`.
- [x] `$artworkImages`: **07 zuerst**, danach bestehende 01–06, dann 08, 09 (Entscheid: prepend 07, 01–06 behalten).
- Datei: `resources/views/pages/project.blade.php`.

### 6. Neuer Text übernehmen ✅
- [x] Startseite: Intro (+ Titel «SHIFT. Zürich Altstetten»), Projektbeschrieb, Kunst am Bau – Tonalität auf «Sie/Ihr».
- [x] Wohnen: Intro, Hauptabsatz, Feature-Items (Weite/Ruhe/Möglichkeit), Downloads-Block.
- [x] Arbeiten: Titel «Wo Ideen Raum bekommen.», Intro (1 Absatz), Hobby-Text, Downloads (nur Kurzbaubeschrieb) in Feature-Section.
- [x] Lage: Intro («Sie»), Transit-Tabelle (+ Zürich Altstetten), Lokal-Tabelle (Hallenbad statt Freibad, + Swiss Life Arena, Bahnhof Altstetten entfernt).
- [x] Facts + Kontakt: siehe Tasks 2 / 11.
- ⚠️ Offen: (1) Download-PDFs fehlen noch (Links `href="#"` auf Wohnen + Arbeiten). (2) Lage «Fotos Reihenfolge» laut docx – Mapping Dateiname→Ort unklar.

---

## Nur Desktop

### 7. Startseite – Logo/Text-Ausrichtung ✅
- [x] Hero-Boxen nutzen jetzt dieselbe Struktur wie `x-layout.inner` (Gutter `px-20 xl:px-30` direkt auf der `max-w-page`-Box statt auf einem äusseren Wrapper).
- Ursache: Header/Unterseiten haben Padding **innerhalb** der max-width-Box; Hero hatte `px-20` auf äusserem Full-Width-Wrapper → andere Berechnung des linken Rands + fehlendes `xl:px-30`.
- Datei: `resources/views/pages/project.blade.php` (Desktop-Hero).

---

## Nur Mobile

### 8. Startseite – Section «Bis Sommer 2027 entstehen» ✅
- [x] Zahlen **zentriert**: `tabular-nums` (gleiche Ziffernbreite) + Spalte `w-56` → `w-64`; «24/12/10» stehen dadurch als saubere zentrierte Kolonne (proportionale Ziffern waren die Ursache).
- [x] Text **linksbündig** explizit gesetzt (`text-left`) – Labels stehen in fixer Spalte, somit alle Zeilen links angebunden.
- Datei: `resources/views/components/blocks/stats.blade.php` (Variante `mobile`).

### 9. Footer – Logo bündig nach unten ✅
- [x] Gelöst vom Kunden: `relative bottom-4 block sm:bottom-0` auf dem `<a>` (Logo auf Mobile 4px tiefer, ab sm bündig).
- Datei: `resources/views/components/layout/footer.blade.php`.

### 10. Buttons/Pfeile in Bildern – grössere Hitbox (Mobile) ✅
- [x] Unsichtbare `::before`-Fläche (`before:-inset-10`) erweitert die Tap-Fläche auf ~56px, nur Mobile (`md:before:content-none`); sichtbarer Kreis unverändert.
- Dateien: `resources/views/components/swiper/buttons/next.blade.php`, `.../prev.blade.php`.

---

## Weitere Anpassungen laut Text-Dokument (docx = Referenz)

### 11. Telefonnummern mit +41 vereinheitlichen ✅
- [x] Footer-Tel.-Nr. auf **+41** umgestellt (`footer.blade.php`).
- [x] Kontaktseite: beide Personen auf «+41 43 537 33 53» umgestellt (`contact.blade.php`).

### 12. Stats-Zahlen & Datum gemäss docx korrigieren ✅
- [x] Heading → **«Bis Mai 2027 entstehen»** (`stats.blade.php`, gilt für Mobile + Desktop).
- [x] Loftwohnungen-Zahl **24 → 45** (`project.blade.php`; 12 Büros und 10 Lager/Hobby bleiben).
- Dateien: `resources/views/components/blocks/stats.blade.php:26` (Heading) und `$stats` in `resources/views/pages/project.blade.php:20-24`.
- Hinweis: Label-Wording ebenfalls an docx angleichen (z. B. «moderne, lichtdurchflutete Loftwohnungen») – Teil von Task 6.
