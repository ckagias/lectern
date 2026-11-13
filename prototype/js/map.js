// Shows the library on a Leaflet map.
var lat = 38.2457;
var lng = 21.7350;

var map = L.map('map').setView([lat, lng], 16);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
tiles.addTo(map);

// Without internet the tiles cannot load, so a message explains the empty map.
tiles.on('tileerror', function () {
    document.getElementById('map-note').hidden = false;
});

L.marker([lat, lng]).addTo(map).bindPopup('<b>AchaiaReads</b><br>Korinthou 100, Patras').openPopup();
