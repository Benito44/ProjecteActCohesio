$(document).ready(function () {



    setInterval(function () {

        $.ajax({
            url: '../Controlador/definirEvent.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.config !== "Pausat") {
                    alert('El joc acaba de començar');
                    let role = $('input[name="role"]').val();

                    if (role === "alumne") {
                        window.location.href = '../Controlador/alumne.php';
                    }
                    else if (role === "profe") {
                        window.location.href = '../Controlador/professor.php';
                    }
                }
            },
            error: function (error) {
                console.error('Error al obtener la configuración:', error);
            }
        });

    }, 5000);


});
