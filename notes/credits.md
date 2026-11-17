# Credits

## Pictures

| File | Source | Author | Licence |
|---|---|---|---|
| `prototype/pictures/about-library-interior-800.jpg`, `about-library-interior-1400.jpg` | [Wikimedia Commons: Library Books Bookshelves (Unsplash).jpg](https://commons.wikimedia.org/wiki/File:Library_Books_Bookshelves_(Unsplash).jpg) | Davide Cantelli | CC0 1.0, no attribution needed |
| `prototype/pictures/hero-reading-room-960.jpg`, `hero-reading-room-1920.jpg` | [Wikimedia Commons: Liverpool Central Library Picton Reading Room (49004383957).jpg](https://commons.wikimedia.org/wiki/File:Liverpool_Central_Library_Picton_Reading_Room_(49004383957).jpg) | Michael D Beckwith | CC0 1.0, no attribution needed |
| `prototype/pictures/texture-book-cloth.jpg` | [Poly Haven: Book Pattern](https://polyhaven.com/a/book_pattern) | Rob Tuytel | CC0 |
| `prototype/pictures/texture-linen.jpg` | [Poly Haven: Rough Linen](https://polyhaven.com/a/rough_linen) | colormass (photography), Rico Cilliers (processing) | CC0 |
| `prototype/pictures/texture-leather.jpg` | [Poly Haven: Brown Leather](https://polyhaven.com/a/brown_leather) | Rob Tuytel | CC0 |

The three `texture` files are the colour maps of those Poly Haven textures turned to grey and scaled to 256 pixels, so the cloth colour of each spine shows through. The two `about-library-interior` files are the same photo resized to 800 and 1400 pixels wide. The two `hero-reading-room` files are a crop of the lower part of the Beckwith photo at 960 and 1920 pixels wide, used on the about section, the login and register pages and the dashboard banner. The hero uses the `about-library-interior` photo. The library in this project is fictional, so the photos show real libraries that are not related to it.

## Fonts

Source Serif 4 (variable font with an optical size axis) and Source Sans 3, both by Paul D. Hunt (Adobe), both under the SIL Open Font License 1.1. Self-hosted in `prototype/fonts/` (Greek and Latin subsets, Source Serif 4 via the Fontsource packages).

## Map

[Leaflet](https://leafletjs.com) 1.9.4, BSD 2-Clause licence. The files are kept in `prototype/js/leaflet/`. Map tiles and data come from [OpenStreetMap](https://www.openstreetmap.org/copyright) contributors.

## Icons

Icon shapes are from [Phosphor Icons](https://phosphoricons.com), MIT licence, drawn inline in `prototype/templates/icons.php`.

## Code

The hero bookshelf (`prototype/templates/shelf.php` and its rules in `prototype/css/home.css`) is built with the idea of [virtual-bookshelf](https://github.com/iwishiwasaneagle/virtual-bookshelf) by iwishiwasaneagle, released under the Unlicense (public domain): each book is a spine and a cover, and hovering turns the book. The code is rewritten for this project, and the "stairs" and "pyramid" spine patterns come from that repository (originally from Lea Verou's CSS3 patterns).

The board under the books (top, front edge and shadow) follows the look of the CodePen bookshelf by ekfuhrmann (https://codepen.io/ekfuhrmann/pen/OJmRVPj). The CSS is rewritten for this project and only the idea and the shape are taken.
