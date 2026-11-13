# Credits

## Pictures

| File | Source | Author | Licence |
|---|---|---|---|
| `prototype/pictures/library-reading-800.jpg`, `library-reading-1400.jpg` | [Wikimedia Commons: Library Books Bookshelves (Unsplash).jpg](https://commons.wikimedia.org/wiki/File:Library_Books_Bookshelves_(Unsplash).jpg) | Davide Cantelli | CC0 1.0, no attribution needed |
| `prototype/pictures/hero-library-960.jpg`, `hero-library-1920.jpg` | [Wikimedia Commons: Liverpool Central Library Picton Reading Room (49004383957).jpg](https://commons.wikimedia.org/wiki/File:Liverpool_Central_Library_Picton_Reading_Room_(49004383957).jpg) | Michael D Beckwith | CC0 1.0, no attribution needed |

The two `library-reading` files are the same photo resized to 800 and 1400 pixels wide. The two `hero-library` files are a crop of the lower part of the Beckwith photo at 960 and 1920 pixels wide, used behind a green tint in the hero. The library in this project is fictional, so the photos show real libraries that are not related to it.

## Fonts

Manrope, by Mikhail Sharanda, SIL Open Font License 1.1. Self-hosted in `prototype/fonts/` (Greek and Latin subsets).

## Map

[Leaflet](https://leafletjs.com) 1.9.4, BSD 2-Clause licence. The files are kept in `prototype/js/leaflet/`. Map tiles and data come from [OpenStreetMap](https://www.openstreetmap.org/copyright) contributors.

## Icons

Icon shapes are from [Lucide](https://lucide.dev), ISC licence, drawn inline in `prototype/includes/icons.php`.

## Code

The hero bookshelf (`prototype/includes/shelf.php` and its rules in `prototype/css/home.css`) is built with the idea of [virtual-bookshelf](https://github.com/iwishiwasaneagle/virtual-bookshelf) by iwishiwasaneagle, released under the Unlicense (public domain): each book is a spine and a cover, and hovering turns the book. The code is rewritten for this project, and the "stairs" and "pyramid" spine patterns come from that repository (originally from Lea Verou's CSS3 patterns).

The board under the books (top, front edge and shadow) follows the look of the CodePen bookshelf by ekfuhrmann (https://codepen.io/ekfuhrmann/pen/OJmRVPj). The CSS is rewritten for this project and only the idea and the shape are taken.
