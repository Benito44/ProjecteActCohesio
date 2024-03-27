window.onload = function() {
    let estatRonda;

    $.ajax({
        url: 'http://localhost/ProjecteActCohesio/Controlador/definirEvent.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
                estatRonda = response.config;
        },
        error: function(error) {
            console.error('Error al obtindre la configuració:', error);
        }
    });


    setInterval(function() {
        $.ajax({
            url: 'http://localhost/ProjecteActCohesio/Controlador/definirEvent.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (estatRonda !== response.config) {
                    alert("S'ha detectat un canvi de ronda. La pàgina es recarregarà.");
                    window.location.reload();
                }
            }
        });
    }, 10000);
}


function crearMapa() {
    var mapaDiv = document.getElementById('mapa');
    var latitud = parseFloat(mapaDiv.getAttribute('data-latitud'));
    var longitud = parseFloat(mapaDiv.getAttribute('data-longitud'));

    var gMaps = new google.maps.Map(
        mapaDiv,
        {
            center: { lat: 41.67833, lng: 2.7803033 },
            zoom: 19.2,
            mapTypeId: 'satellite'
        });

    var marker = new google.maps.Marker({
        position: { lat: latitud, lng: longitud },
        map: gMaps,
        icon: {
            url: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
            labelOrigin: new google.maps.Point(20, 40)
        },
        label: {
            text: '1',
            color: '#000',
            fontSize: '24px',
            fontWeight: 'bold'
        }
    });
}

window.crearMapa = crearMapa;


