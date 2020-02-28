<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo; ?></title>
    <link rel="shortcut icon" href="<?php echo $raiz;?>img/alce.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/all.css">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/bootstrap-material-design.css">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/banco.css">
</head>
<body>
<main class="bg-gris">
        <?php if( $mostrarMenu ): ?>
        <ul class="nav menu-navegacion bg-azul justify-content-center">
            <div class="container-fluid fixed-top">
                    <div class="row bg-color">
                    <div class="col-6 mt-2 text-center">
                    <a href="<?php echo $raiz;?>modulos/paginas/pagina-principal.php">
                        <img class="rounded float-left" src="<?php echo $raiz;?>img/univer.jpg" style="height: 5rem;" alt="">
                        <p class="text-dark font-weight-bold h2 mb-0 mt-3 ml-5 float-left">BanUniver</p>
                    </a>
                    </div>
                        <div class="col-xs-12 col-sm-8 col-dm-6 col-lg-6 mt-2">
                            <form action="" method="post" class="mb-0">
                                <div class="row mt-3">      
                                    <button type="button" class="btn btn-raised"><a href="../paginas/nominas.php">Nominas</a></button>
                                    <button type="button" class="btn btn-raised"><a href="../paginas/cuentas.php">Cuentas</a></button>
                                    <button type="button" class="btn btn-raised"><a href="../paginas/credito.php">Credito</a></button>
                                    <button type="button" class="btn btn-raised"><a href="../paginas/envio-diner.php">Envio de dinero</a></button>
                                    <button type="button" class="btn btn-raised"><a href="../paginas/ultimos-mov.php">Ultimos Mov</a></button>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle mas-opciones bg-" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 13rem;">
                                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Configuración</a>
                                                <a class="dropdown-item" href="<?php echo $raiz."modulos/php/cerrar-sesion.php"; ?>"><i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </form> 
                        </div>
                    </div>
                    <div class="col-2">
                        <p class="ml-5 h5" style="background: #FFF; "><?php echo $titulo;?></p>
                    </div>
                </div>
                   
            <?php else: ?>
                <div class="container-fluid">
                    <div class="row bg-color">
                    <div class="col-6 mt-2 text-center">
                        <img class="rounded float-left" src="<?php echo $raiz;?>img/univer.jpg" style="height: 5rem;" alt="">
                        <p class="text-dark font-weight-bold h2 mb-0 mt-3 ml-5 float-left">BanUniver</p>
                    </div>
                        <div class="col-4 mt-2">
                            <form id="loginUser" class="login-validation" novalidate class="mb-0">
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <input type="text" name="correoTelefonoLogin" class="form-control" required placeholder="Correo electrónico o tel" >
                                        <div class="invalid-tooltip">
                                            Por favor ingresa tu correo o tu telefono.
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="password" name="paswordLogin"  class="form-control" required placeholder="nip" >
                                        <div class="invalid-tooltip">
                                            Por favor ingresa tu nip.
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-raised btn-primary bg-azul">Entrar</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>   
        <?php endif;?>