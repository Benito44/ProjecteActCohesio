<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sessió</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../Estils/estils.css">
    </head>
    <body>
        <br>
    </header>
    <header>

        <div class="row justify-content-center offset-sm-4 col-lg-4 col-sm-4"> 
            <div class="container-fluid">
                <form action="../Controlador/login.php" id="form" method="post">
                    Usuari
                    <input type="text"  id="usuari" name="usuari" placeholder="Usuari1"><br><br>
                    Contrasenya
                    <input type="password" id="contra" name="contra" placeholder="Usuari1@1234"><br><br>
                    <input type="submit" value="Login">
                </form>
                <div class="enlace">
                    <?php require ('../Controlador/autentificacion.php')?>
                    <a href="<?php echo $client->createAuthUrl() ?>">Iniciar sesión amb Google</a>
                </div>
                <form action="registrar.vista.php" id="form" method="post"> 
                    No t'has registrat? Registrat aqui!!<br><br>
                    <input type="submit" value="Registrar">
                </form>
                <form method="POST" action="../Controlador/recupera_contra.php"> 
                    Recupera la contrasenya<br>
                    <input type="text" name="email" id="email" placeholder="correu electronic">
                    <input type="submit" value="Recuperar">
                </form>
                <h1>Iniciar sessió</h1>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

</script>
</body>
</html>