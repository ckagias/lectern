// Shows the library on a Leaflet map. The position and texts come from the data attributes of the #map element.
var mapBox = document.getElementById('map');
var note = document.getElementById('map-note');

if (mapBox && window.L) {
    var lat = Number(mapBox.getAttribute('data-lat'));
    var lng = Number(mapBox.getAttribute('data-lng'));
    var name = mapBox.getAttribute('data-name');
    var address = mapBox.getAttribute('data-address');

    var map = L.map('map').setView([lat, lng], 16);

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    tiles.addTo(map);

    // Without internet the tiles cannot load, so a message explains the empty map.
    tiles.on('tileerror', function () {
        note.hidden = false;
    });

    L.marker([lat, lng]).addTo(map).bindPopup('<b>' + name + '</b><br>' + address).openPopup();
} else if (note) {
    note.hidden = false;
}
