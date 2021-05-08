<?php session_start();

if( isset($_SESSION['usuario']) ){
    header('Location: home.php');
}
error_reporting(0);

require('registro.php');
require('validar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3 class="mt-3">Registrate</h3>
                <form action="index.php" method="POST" class="mb-3">
                    <div class="form-group mb-2">
                        <input type="email" class="form-control" placeholder="Tu email" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" class="form-control" placeholder="Tu contraseña" name="password">
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" class="form-control" placeholder="Repite tu contraseña" name="password-2">
                    </div>
                    <input type="submit" name="button1" class="btn btn-primary mb-3">

                    <?php if( !empty($alert_red) ){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $alert_red; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }; ?>
                    <?php if( !empty($alert_green) ){ ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $alert_green; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }; ?>

                </form>
            </div>
            <div class="col-md-6 login-form-2">
                <h3 class="mt-3">Inicia Sesión</h3>
                <form action="index.php" method="POST" class="mb-3">
                    <div class="form-group mb-2">
                        <input type="email" class="form-control" placeholder="Tu email" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" class="form-control" placeholder="Tu contraseña" name="password">
                    </div>
                    <input type="submit" name="button2" class="btn btn-primary mb-3">

                    <?php if( !empty($alert_red_login) ){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $alert_red_login; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }; ?>

                </form>
            </div>
        </div>
    </div>


    <!-- <script src="https://kit.fontawesome.com/f60d096336.js" crossorigin="anonymous"></script> -->
    <script src="bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
</body>
</html>

