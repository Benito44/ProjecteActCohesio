<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estils/alumnes.css">
    <script src="../Controlador/mapa.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCprdU5TR5GHDdY4EuOZb_dKHm2nXmX-EE&callback=crearMapa"></script>
    <title>Alumnes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Cognoms</th>
                <th>Clase</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnes as $alumne): ?>
                <tr>
                    <td><?php echo $alumne['nom']; ?></td>
                    <td><?php echo $alumne['cognoms']; ?></td>
                    <td><?php echo $alumne['Clase']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <div id="mapa" class="mapa"></div>
</body>
</html>
