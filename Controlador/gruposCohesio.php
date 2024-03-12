<?php 

session_start();

if ($_SESSION['rol'] != "admin") {
    echo "<script type='text/javascript'>alert('No pots accedir a aquesta pàgina si no ets administrador.');</script>";
    header('refresh:0.01;url=../Vista/espera.php');
    
} else {

    require_once '../Model/consultasbd.php';
    $grupos = seleccionarGrup();

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emparejar'])) {
        include '../Vista/gruposCohesio.php';
        // Generar nuevas parejas
        $parejas = generarParejas($grupos);
        
        // Mostrar las nuevas parejas
        echo "<br>";
        echo "<div class='centrar'>";
        echo "<h2>Enfrontaments Generats:</h2>";
        echo "<ul>";
        foreach ($parejas as $pareja) {
            echo "<li>{$pareja[0]} - {$pareja[1]}</li>";
        }
        echo "</ul>";
        
        // Mostrar botón para volver a generar parejas
        echo "<h2>Generar Nous Enfrontaments</h2>";
        echo "<form method='post' action='{$_SERVER["PHP_SELF"]}'>";
        echo "<input type='submit' name='emparejar' value='Generar Nous Enfrontaments'>";
        echo "</form>";
        echo "</div>";

    } else {
        include "../Vista/gruposCohesio.php";
    }
    


}
?>