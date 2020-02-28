<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo; ?></title>
    <link rel="shortcut icon" href="<?php echo $raiz;?>img/alce.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/all.css">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/bootstrap-material-design.css">
    <link rel="stylesheet" href="<?php echo $raiz;?>css/banco.css">
    <style>.modal-backdrop{z-index: 1029;}</style>
</head>

<body>
    <main class="bg-gris">
        <?php if( $mostrarMenuRoot ): ?>
        <ul class="nav menu-navegacion bg-color justify-content-center ">
            <div class="container-fluid">
                <div class="row bg-color">
                <div class="col-6 mt-2 text-center">
                        <img class="rounded float-left" src="<?php echo $raiz;?>img/univer.jpg" style="height: 5rem;" alt="">
                        <p class="text-dark font-weight-bold h2 mb-0 mt-4 ml-5 float-left">BanUniver</p>
                    </div>
                    <div class="col-6 mt-2">
                            <div class="row mt-3">
                            <button type="button" class="btn btn-raised font-family"><a href="../paginas/usuarios.php">Usr</a></button>
                                <button type="button" class="btn btn-raised font-family"><a href="../paginas/targetas.php">Targetas</a></button>
                                <button type="button" class="btn btn-raised font-family"><a href="../paginas/transacciones.php">Transacciones</a></button>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mas-opciones bg-" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            style="width: 13rem;">
                                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>
                                                Configuración</a>
                                            <a class="dropdown-item" href="<?php echo $raiz."modulos/php/cerrar-sesion.php"; ?>"><i
                                                    class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión</a>
                                        </div>
                                    </div>
                                </li>
                            </div>
                    </div>
                </div>
                <div class="col-2">
                        <p class="ml-5 h5" style="background: #FFF; "><?php echo $titulo;?></p>
                    </div>
            </div>
            <?php endif;?>
             
       