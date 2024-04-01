$(document).ready(function () {
  let tempsRestant = 600;
  let interval;


  $.ajax({
    type: "POST",
    url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
    data: { estat: "Pausat" }
  });


  function actualitzarCronometre() {
    let minuts = Math.floor(tempsRestant / 60);
    let segons = tempsRestant % 60;

    let minutsStr = minuts < 10 ? "0" + minuts : minuts;
    let segonsStr = segons < 10 ? "0" + segons : segons;

    $("#cronometre").text("Temps restant: " + minutsStr + ":" + segonsStr);

    // Decrementar el tiempo restante en 1 segundo
    tempsRestant--;
    if (tempsRestant == 0) {
      $("#next").prop("disabled", false);
    }

    // Si el tiempo restante llega a cero, detener el intervalo y mostrar una alerta
    if (tempsRestant < 0) {
      clearInterval(interval);
      alert("Temps acabat!");
    }
  }



  $("#inicii").click(function () {

    interval = setInterval(actualitzarCronometre, 1000);
    $("#pausa").prop("disabled", false);
    $("#end").prop("disabled", false);
    $("#next").prop("disabled", false);
    $("#inicii").prop("disabled", true);
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
        }
      }
    });
  });

  $("#next").click(function () {

    $("#next").prop("disabled", false);
    $("#end").prop("disabled", false);
    $("#inicii").prop("disabled", true);
    $("#pausa").prop("disabled", false);
    clearInterval(interval);
    tempsRestant = 600; // Reiniciar el temporizador a 600 segundos
    let minuts = Math.floor(tempsRestant / 60);
    let segons = tempsRestant % 60;
    let minutsStr = minuts < 10 ? "0" + minuts : minuts;
    let segonsStr = segons < 10 ? "0" + segons : segons;
    $("#cronometre").text("Temps restant: " + minutsStr + ":" + segonsStr);
    interval = setInterval(actualitzarCronometre, 1000);
    $.ajax({
      type: "POST",
      url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
      data: { estat: "Seguent" }
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
    $("#inicii").prop("disabled", false);
    $("#pausa").prop("disabled", true);

    $.ajax({
      type: "POST",
      url: "http://localhost/ProjecteActCohesio/Controlador/definirEvent.php",
      data: { estat: "Pausa" }
    });
  });


  $("#next").prop("disabled", true);
  $("#pausa").prop("disabled", true);
  $("#end").prop("disabled", true);
  setInterval(function () {

  }, 5000);
});
