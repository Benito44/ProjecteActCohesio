<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inici</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/estils.css">
</head>

<body>
  <?php include 'AdminHeader.vista.php'; ?>
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