<!DOCTYPE html>
<html>
<head>
    <title>Emparejar Grupos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estils/estils.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="../Controlador/validacions.js"></script>
</head>

<body>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="sessio.php">Llista de grups</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="llistaAlumn.php">Llista d'alumness</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="afegir.php">Afegir alumnes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modificarGrupAlumne.php">Modificar grups</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Controlador/redireccioWebSocket.php">Iniciar Joc</a>
              </li>
            </ul>
          </div>
        </div>
    </header>

<h2>Generar Parejas</h2>
    <form method='post' action='../Controlador/gruposCohesio.php'>
   <input type='submit' name='emparejar' value='Generar Parejas'>
    </form>
</body>
</html>
