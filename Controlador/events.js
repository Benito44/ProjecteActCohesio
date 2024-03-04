$(document).ready(function() {
    let tempsRestant = 600;
    let interval;

    function actualitzarCronometre() {
        let minuts = Math.floor(tempsRestant / 60);
        let segons = tempsRestant % 60;

        let minutsStr = minuts < 10 ? '0' + minuts : minuts;
        let segonsStr = segons < 10 ? '0' + segons : segons;

        $('#cronometre').text('Temps restant: ' + minutsStr + ':' + segonsStr);

        // Decrementar el tiempo restante en 1 segundo
        tempsRestant--;
        if (tempsRestant == 0) {
            $('#next').prop('disabled', false);
        }

        // Si el tiempo restante llega a cero, detener el intervalo y mostrar una alerta
        if (tempsRestant < 0) {
            clearInterval(interval);
            alert('Temps acabat!');
        }
    }

    $('#inicii').click(function() {
        // Iniciar el intervalo para actualizar el cronómetro cada segundo
        interval = setInterval(actualitzarCronometre, 1000);
        $('#pausa').prop('disabled', false);
        $('#end').prop('disabled', false);
    });

    $('#pausa').click(function() {
        // Pausar el intervalo
        clearInterval(interval);
    });

    $('#next').prop('disabled', true);
    $('#pausa').prop('disabled', true);
    $('#end').prop('disabled', true);
});
