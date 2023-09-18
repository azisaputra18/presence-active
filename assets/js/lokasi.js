var map = L.map('map').setView([0, 0], 13); // Atur koordinat awal dan zoom level
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

var marker;

function getCoordinates() {
    map.on('click', function(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        var latlng = e.latlng;
        document.getElementById('latitude').value = latlng.lat;
        document.getElementById('longitude').value = latlng.lng;
        marker = L.marker(latlng).addTo(map);
    });
}
