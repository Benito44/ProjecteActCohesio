"use strict";


$("#btnGenerar").click(generar);


function generar() {
  var sobrescribir = confirm("Vols sobreescriure els grups?");

  // Enviar la respuesta al servidor
  if (sobrescribir) {
    window.location.href = "../Controlador/generarGrups.php?overwrite=yes";
  } else {
    window.location.href = "../Controlador/generarGrups.php?overwrite=no";
  }
}
