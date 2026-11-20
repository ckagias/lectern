// Shows the library on a Leaflet map.
var lat = 38.2457;
var lng = 21.7350;

// On phones one finger scrolls the page. Two fingers zoom the map.
var map = L.map('map', {dragging: !L.Browser.mobile}).setView([lat, lng], 16);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
tiles.addTo(map);

// Offline the tiles fail so a note explains the empty map.
tiles.on('tileerror', function () {
    document.getElementById('map-note').hidden = false;
});

// The address comes from the language file through the page.
var address = document.getElementById('map').dataset.address;
L.marker([lat, lng]).addTo(map).bindPopup('<b>AchaiaReads</b><br>' + address).openPopup();
