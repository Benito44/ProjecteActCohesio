$(document).ready(function () {
  let tempsRestant = 600;
  let interval;


  $.ajax({
    type: "POST",
    url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
    data: { estat: "Pausat" }
  });

  obtenitInformacio();

  function actualitzarCronometre() {
    let minuts = Math.floor(tempsRestant / 60);
    let segons = tempsRestant % 60;

    let minutsStr = minuts < 10 ? "0" + minuts : minuts;
    let segonsStr = segons < 10 ? "0" + segons : segons;

    $("#cronometre").text("Temps restant: " + minutsStr + ":" + segonsStr);

    // Decrementar el tiempo restante en 1 segundo
    tempsRestant--;
    if (tempsRestant == 0) {
      let rondasRestants = parseInt($("#rondasRestants").text());
      if (rondasRestants == 0) {
        $("#next").prop("disabled", true);
        $("#inicii").prop("disabled", true);
        $("#pausa").prop("disabled", true);
        $("#end").prop("disabled", false);
      } else {
      $("#next").prop("disabled", false);
      }
    }

    // Si el tiempo restante llega a cero, detener el intervalo y mostrar una alerta
    if (tempsRestant < 0) {
      clearInterval(interval);
      alert("Temps acabat!");
    }
  }



  $("#inicii").click(function () {

    let rol = "<?php echo $_SESSION['rol']; ?>";
    $.ajax({
      type: "POST",
      url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
      data: { estat: "Iniciat" },
      success: function (response) {
        let parsed = JSON.parse(response);
        console.log(parsed);
        if (parsed.error) {
          alert("S'ha produit un error a l'hora d'iniciar l'activitat:\n" + parsed.error);
        } else{
          interval = setInterval(actualitzarCronometre, 1);
          $("#pausa").prop("disabled", false);
          $("#inicii").prop("disabled", true);
          obtenitInformacio();
        }
      },
      error: function (error) {
        console.error('Error en la petición AJAX:', error);
      }
    });
  });

  $('#inici').click(function () {
    interval = setInterval(actualitzarCronometre, 1);
    $("#pausa").prop("disabled", false);
    $("#inici").prop("disabled", true);

  });

  $("#next").click(function () {

    $("#next").prop("disabled", true);
    $("#inicii").prop("disabled", true);
    $("#pausa").prop("disabled", false);
    clearInterval(interval);
    tempsRestant = 600;
    let minuts = Math.floor(tempsRestant / 60);
    let segons = tempsRestant % 60;
    let minutsStr = minuts < 10 ? "0" + minuts : minuts;
    let segonsStr = segons < 10 ? "0" + segons : segons;
    $("#cronometre").text("Temps restant: " + minutsStr + ":" + segonsStr);
    interval = setInterval(actualitzarCronometre, 1);
    $.ajax({
      type: "POST",
      url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
      data: { estat: "Seguent" },
      success: function (response) {
        let parsed = JSON.parse(response);
        if (parsed.error) {
          alert("S'ha produit un error a l'hora de passar a la següent ronda:\n" + parsed.error);
        } else {
          obtenitInformacio();
        }
      }
    });

    

  });
  $("#end").click(function () {
    $("#pausa").prop("disabled", true);
    $("#end").prop("disabled", true);
    $("#next").prop("disabled", true);
    $("#inicii").prop("disabled", false);
    clearInterval(interval);
    tempsRestant = 600; // Reiniciar el temporizador a 600 segundos
    let minuts = Math.floor(tempsRestant / 60);
    let segons = tempsRestant % 60;
    let minutsStr = minuts < 10 ? "0" + minuts : minuts;
    let segonsStr = segons < 10 ? "0" + segons : segons;
    $("#cronometre").text("Temps restant: " + minutsStr + ":" + segonsStr);

    $.ajax({
      type: "POST",
      url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
      data: { estat: "Aturat" }
    });
  });


  $("#pausa").click(function () {
    // Pausar el intervalo
    clearInterval(interval);
    $("#inici").prop("disabled", false);
    $("#pausa").prop("disabled", true);

    $.ajax({
      type: "POST",
      url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
      data: { estat: "Pausa" }
    });
  });

  $("#inici").prop("disabled", true);
  $("#next").prop("disabled", true);
  $("#pausa").prop("disabled", true);
  $("#end").prop("disabled", true);
  setInterval(function () {

  }, 5000);


});

$(window).on("beforeunload", function () {
  $.ajax({
    type: "POST",
    url: "http://localhost/ProjecteActCohesio/Controlador/clearBD.php",
  });
  return null;
});

function obtenitInformacio(){
  $.ajax({
    type: "GET",
    url: "http://localhost/ProjecteActCohesio/Controlador/obtenirInfo.php",
    success: function (response) {
      try {
        let parsed = JSON.parse(response);
        $("#rondasTotals").text(parsed.rondasTotals);
        $("#rondasRestants").text(parsed.rondasRestants);
        $("#rondaActual").text(parsed.rondaActual);
        $("#grupsTotals").text(parsed.grupsTotals);
        if (parsed.rondaActual == parsed.rondasTotals) {
          $("#next").prop("disabled", true);
          $("#inicii").prop("disabled", true);
          $("#pausa").prop("disabled", true);
          $("#end").prop("disabled", false);
        }
      } catch (error) {
        console.error("Error parsing JSON:", error);
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX request failed:", error);
    }
  });
}