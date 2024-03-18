$(document).ready(function () {

    setInterval(function() {
        $.ajax({
            url: 'http://localhost/ProjecteActCohesio/Controlador/definirEvent.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Configuración obtenida:', response.config);
            },
            error: function(error) {
                console.error('Error al obtener la configuración:', error);
            }
        });
    }, 5000);


});
