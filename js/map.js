// Funktion som kallas av Google för att skapa vår karta
// Denna function anger vi i en callback parameter i script
function initMap() {
    // Sätt latitude och longitud i en variabel
    var uluru = {lat: -25.344, lng: 131.036};
    // Instansiera en ny Google Maps com är centrerad på ovanstående kordinater
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 4,
            center: uluru,
            disableDefaultUI: true,
            gestureHandling: 'none'
        }
    );
    // Information ruta
    var contentString = '<div id="content">\n' +
        '    <div id="siteNotice"></div>\n' +
        '    <h1 id="firstHeading" class="firstHeading">Google Maps API är skoj :)</h1>\n' +
        '    <div id="bodyContent">\n' +
        '        <p>\n' +
        '            <b>Hej allihopa!</b>\n' +
        '            Här har vi nu en text som visas i en ruta när man klickar på markören :)<br>\n' +
        '            Super bra om man vill visa information om något!\n' +
        '        </p>\n' +
        '    </div>\n' +
        '</div>';
    // Instansiera en nya information ruta och sätt ovanstående html till den
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    // Sätt ut en markering på kartan med positionen från vår variabel
    var marker = new google.maps.Marker(
        {
            position: uluru,
            map: map,
            icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
        }
    );
    // Lägg till en listener på markören.
    // Om vi klickar ska vi öppna informationsrutan och placera den på samma ställe som markören
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
}