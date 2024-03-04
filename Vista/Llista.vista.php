<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inici</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                <a class="nav-link" href="gruposCohesio.php">Grupos cohesion</a>
                <a class="nav-link" href="../Vista/Iniciar.html">Iniciar Joc</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <?php if (empty($alumnes)) : ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>No hi ha alumnes</h1>
        </div>
      </div>
    </div>
  <?php else : ?>
    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <thead>
          </thead>
          <tbody>
            <tr>
              <td>Total de grups: <?= $grups['total_grups'] ?></td>
              <td><?= $grups['noms_grups'] ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container">
      <div class="group-container">
        <?php foreach ($nomGrups as $grup) : ?>
          <div style="display:flex; flex-direction: row; justify-content: space-between;">
            <div class="group-box">
              <h4 class="group-title">Grup <?= $grup['nom'] ?></h4>
              <?php foreach ($alumnes as $alumne) : ?>
                <ul class="student-list">
                  <?php if ($alumne['grup_id'] == $grup['id']) : ?>
                    <?= $alumne['nom'] ?> <?= $alumne['cognoms'] ?>
                  <?php endif; ?>
                </ul>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>