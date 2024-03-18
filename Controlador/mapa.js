function crearMapa() {
    gMaps = new google.maps.Map(
        document.getElementById('mapa'),    // Element on dibuixar el mapa
        {
            center: {lat: 41.67833, lng: 2.7803033},    // Latitut i longitut del centre del mapa
            zoom: 19.2,                            // Ampliació
            mapTypeId: 'satellite'                // Format del mapa (satèl·lit)
        });

        var marker = new google.maps.Marker({
            position: { lat: 41.67833, lng: 2.7803033 }, 
            map: gMaps, 
            icon: {
                url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
                labelOrigin: new google.maps.Point(20, 40) 
            },
            label: {
                text: '1',
                color: '#000',
                fontSize: '16px', 
                fontWeight: 'bold' 
            }
        });
    
}

window.crearMapa = crearMapa;