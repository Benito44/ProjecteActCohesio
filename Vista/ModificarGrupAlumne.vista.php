<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar grup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- JQuery 3.7.1.min -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../Estils/estils.css">
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
                <a class="nav-link" href="../Vista/Iniciar.php">Iniciar Joc</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="../Controlador/gruposCohesio.php">Enfrontaments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link sessio" href="../Controlador/cerrar_session.php">Tancar Sessió</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <h1>Modificar grup d'alumne</h1>
  <div class="container">
    <div class="row">
      <?php if (empty($grups)) : ?>
        <div class="col-12">
          <h1>No hi ha grups</h1>
        </div>

      <?php else : ?>
        <form action="" method="POST">
          <?php if (!isset($originalGroupId)) : ?>

            <label>
              Grup original
              <select name="originalGroup" id="" class="form-select">
                <option>Grup</option>
                <?php
                foreach ($grups as $grup) : ?>
                  <option value="<?php echo $grup['id']; ?>"><?php echo $grup['nom']; ?></option>
                <?php endforeach; ?>
              </select>
            </label>
          <?php else : ?>
            <h2>Alumnes del grup <?php echo $originalGroupName; ?></h2>
            <label>
              Alumne
              <select name="alumne" id="" class="form-select">
                <option>Alumne</option>
                <?php
                foreach ($alumnes as $alumne) : ?>
                  <option value="<?php echo $alumne['id']; ?>"><?php echo $alumne['nom'] . ' ' . $alumne['cognoms']; ?></option>
                <?php endforeach; ?>
              </select>
            </label>

            <label>
              Nou grup
              <select name="grup" id="" class="form-select">
                <option>Grup</option>
                <?php
                foreach ($grups as $grup) : ?>
                  <option value="<?php echo $grup['id']; ?>"><?php echo $grup['nom']; ?></option>
                <?php endforeach; ?>
              </select>
            </label>
          <?php endif; ?>

          <button type="submit" class="btn btn-secondary">Canviar grup</button>
        </form>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>