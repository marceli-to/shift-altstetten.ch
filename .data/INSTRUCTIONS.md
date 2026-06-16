# Shift Altstetten

This is a copy of another project, so some things need to be adjusted. The new local domain is `shift-altstetten.ch`, register with herd (including ssl certificate).

## Assets
Clean up the public folder (img, downloads, etc.). You'll find the new images in .data/Bilder, make sure to create a webp and avif version of each image. files names should be lowercase only and using hyphens as separator.

## Fonts
Webfonts are in the .data/Font directory, make sure to use them in the project.

## Colors
I've added the new colors in @colors.scss, make sure to use them in the project. Make sure to use a one word name for each color without interference with existing colors. Keep --color-state* for now. 

## Icons / Logo
Clean SVG are in the asset folder. Make sure to use currentColor inside and create a blade component for each icon and logo with class="{{ $class ?? '' }}". Use variants for similar icons

## Lightbox
Can be removed entirely, as it's not used in this project.

## Page structure
Use the following page structure. Initially create 'empty' pages for each. Set up blade views and routes for each page.

- Projekt (project used as landing/home page)
- Wohnen (living)
- Arbeiten (working)
- Lage (location)
- Kontakt (contact)

## Blade components
Remove the following components:
- sections/highlights.blade.php
- accordion/*
- cards/*

## Object data
The current project uses flatfox as data source, the new one melon. See @MELON_SETUP.md for setup instructions.

## Object isometrie
This is currently being worked on so, so we'll work with an example from another melon project.

API:
MELON_API_URL="https://scalazuerich.api.melon.market/api/v2/objects/?format=json"

Templates:
- @Melon-Example/*

## Layout

### Hero split
Will be used multiple times but not always as hero section. Rename to just 'split'.

### Footer
Use @Templates/footer.blade.php as footer template. Convert form antlers to blade first. This is from another project and needs to be adjusted to fit the current project.

## Webfonts
See @Font/* for webfonts

## Ammendments

1. Webfonts
@theme {
  --font-sans: 'Glacial Indifference', sans-serif;
  --font-display: 'Glacial Indifference', sans-serif;
}

should be:

@theme {
  --font-sans: 'Glacial Indifference', sans-serif;
}

2. Maps
Remove entirely (js, blade, css)

3. Spacing scale
Update @spacing.css upto 500

4. Header
- height mobile: 80px (convert to rem)
- height desktop: 94px (convert to rem)
- sticky

5. Split panel
- need a variant (pink or blue color)








