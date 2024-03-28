"use strict";

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
                if (estatRonda == "Pausat")
                {
                    alert('El joc està pausat');
                    window.location.href = '../Controlador/respera.php';
                }else if (estatRonda !== response.config) {
                    alert("S'ha detectat un canvi de ronda. La pàgina es recarregarà.");
                    window.location.reload();
                }
            }
        });
    }, 10000);
}
