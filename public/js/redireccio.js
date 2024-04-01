$(document).ready(function () {
    let estatRonda;

    $('#taula1').hide();
    $('#taula2').hide();


    $('#toggleAlumnosBtn1').click(function () {
        $('#toggleAlumnosBtn1').hide();
        $('#taula1').slideDown();
    });

    $('#toggleAlumnosBtn2').click(function () {
        $('#toggleAlumnosBtn2').hide();
        $('#taula2').slideDown();
    });

    $('button[name="grup1decr"]').click(function () {
        let punts = parseInt($('#punts1').val());
        if (confirm("Estàs segur que vols restar punts?")) {
            punts--;
            $('#punts1').val(punts).trigger('input');
        }
    });
    
    $('button[name="grup1incr"]').click(function () {
        let punts = parseInt($('#punts1').val());
        punts++;
        $('#punts1').val(punts).trigger('input');
    });
    
    $('button[name="grup2decr"]').click(function () {
        let punts = parseInt($('#punts2').val());
        if (confirm("Estàs segur que vols restar punts?")) {
            punts--;
            $('#punts2').val(punts).trigger('input');
        }
    });
    
    $('button[name="grup2incr"]').click(function () {
        let punts = parseInt($('#punts2').val());
        punts++;
        $('#punts2').val(punts).trigger('input');
    });
    
    
    $('#punts1').on('input', function () {
        let punts = parseInt($(this).val());
        let grup = $('input[name="grup1"]').val();
        let activitat = $('input[name="activitat"]').val();
        $.ajax({
            url: 'http://localhost/ProjecteActCohesio/Controlador/definirPunts.php',
            method: 'POST',
            data: { grup: grup, punts: punts, activitat: activitat },
            success: function (response) {
                console.log("Punts actualitzats");
            },
            error: function (error) {
                console.error('Error al actualizar los puntos:', error);
            }
        });
    });

    $('#punts2').on('input', function () {
        let punts = parseInt($(this).val());
        let grup = $('input[name="grup2"]').val();
        let activitat = $('input[name="activitat"]').val();
        $.ajax({
            url: 'http://localhost/ProjecteActCohesio/Controlador/definirPunts.php',
            method: 'POST',
            data: { grup: grup, punts: punts, activitat: activitat },
            success: function (response) {
                console.log("Punts actualitzats");
            },
            error: function (error) {
                console.error('Error al actualizar los puntos:', error);
            }
        });
    });


    $.ajax({
        url: 'http://localhost/ProjecteActCohesio/Controlador/definirEvent.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            estatRonda = response.config;
        },
        error: function (error) {
            console.error('Error al obtindre la configuració:', error);
        }
    });


    setInterval(function () {
        $.ajax({
            url: 'http://localhost/ProjecteActCohesio/Controlador/definirEvent.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (estatRonda == "Pausat") {
                    alert('El joc està pausat');
                    window.location.href = '../Controlador/respera.php';
                } else if (estatRonda !== response.config) {
                    alert("S'ha detectat un canvi de ronda. La pàgina es recarregarà.");
                    window.location.reload();
                }
            }
        });
    }, 10000);
});
