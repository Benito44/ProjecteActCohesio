$(document).ready(function () {

    setInterval(function() {
        $.ajax({
            url: 'http://localhost/ProjecteActCohesio/Controlador/definirEvent.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response != "Aturat"){
                    alert('El joc acaba de començar');
                    window.location.href = '../Controlador/alumne.php';
                }
            },
            error: function(error) {
                console.error('Error al obtener la configuración:', error);
            }
        });
        
    }, 5000);


});
