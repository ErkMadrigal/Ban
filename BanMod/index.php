<?php include 'modulos/config.php';?>
<?php $titulo = "Portal"; $mostrarMenu = false; include 'modulos/componentes/header.php'; ?>
    <link rel="stylesheet" href="css/scroll_style.css">
<div class="container-fluid">
    <div class="alert alert-success mt-4" id="respuestaCorrecta" role="alert">

    </div>
    <div class="alert alert-danger" id="respuestaErronea"  role="alert">

    </div>
    
<div class="container-fluid">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: 400px !important;"
                    src="<?php echo $raiz;?>img/Cuenmtasbcs.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block bg-dark">
                    <h5>Ve tus Cuentas</h5>
                    <p>la mejor interfaz para ti ve a nuestra sucursal y pregunta por nuestas ofertas</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" style="height: 400px !important;"
                    src="<?php echo $raiz;?>img/finanzasmaster.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block bg-dark">
                    <h5>Finanzas.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" style="height: 400px !important;" src="<?php echo $raiz;?>img/prestamos.jpg"
                    alt="Third slide">
                <div class="carousel-caption d-none d-md-block bg-dark">
                    <h5>Prestamos</h5>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<div class="card-columns mt-4">
    <div class="card">
        <img class="card-img-top" src="<?php echo $raiz;?>img/innovacion.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">
                <a href="">
                    El impulso a la inversión y el
                    otorgamiento responsable de crédito, los
                    pilares estratégicos
                </a>
            </h5>
            <p class="card-text">
                Al presentar sus resultados correspondientes al ejercicio 2018, BBVA Bancomer enfatizó que seguirá
                promoviendo, a través del otorgamiento responsable del crédito y la generación de inversión,
            </p>
        </div>
    </div>
    <div class="card p-3">
        <blockquote class="blockquote mb-0 card-body">
            <p><a href="">los mejores creditos y beneficios para exclusivamente para ti</a></p>
            <footer class="blockquote-footer">
                <small class="text-muted">
                    pulsa aqui para cdar un vistazo <cite title="Source Title">te esperamos</cite>
                </small>
            </footer>
        </blockquote>
    </div>
    <div class="card">
        <img class="card-img-top" src="<?php echo $raiz;?>img/grafico.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Disfruta tus veneficios</h5>
            <p class="card-text">las mejore promociones a tu acesivilidad</p>
        </div>
    </div>
    <div class="card bg-primary text-white text-center p-3">
        <blockquote class="blockquote mb-0">
            <p>solo dale un vistaso a nuestra taza de interez</p>
            <footer class="blockquote-footer">
            </footer>
        </blockquote>
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title"><a href="">Seguridad</a></h5>
            <p class="card-text">Toda tu informacion a solo un clik de distancia sin hacer filas forzosas</p>
            <p class="card-text"><small class="text-muted">Buscamos siempre tu comodidad y srguridad</small></p>
        </div>
    </div>
    <div class="card">
        <img class="card-img" src="<?php echo $raiz;?>img/Cloud-Security.jpg" alt="Card image">
    </div>
    <div class="card p-3 text-right">
        <blockquote class="blockquote mb-0">
            <p><a href="">Monitorea tu informacion las veces que quieras a las 24 horas del dia a los 365 dias del
                    año</a></p>
            <footer class="blockquote-footer">
                <small class="text-muted">
                    te aseguramos a ti y tu familia
                </small>
            </footer>
        </blockquote>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="">Ve nuestras targetas y tramitate una al alcance de tus gastos</a></h5>
            <p class="card-text">la taza de interes mas baja del mercado</p>
        </div>
    </div>
</div>

<!-- imagen de fondo -->
<div class='contenedor_general'>
</div>
<!-- contenedor-->
<div class='body'>
    <div class='scrolldown col-6'>
        <p class='titulo'>Sigenos</p>
        <p class='menorque'>
            <</p> </div> <div class='seccion'>
                <div class="row mt-5">
                    <div class="col-3">
                        <div class="ml-3">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Light card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Dark card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="ml-3">
                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Light card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Dark card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="width: 40rem;">
                            <img class="card-img-top" src="img/data.jpg" style="height: 20rem; width: 40rem;"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Un sistema accesible</h5>
                                <p class="card-text">EL sistema al alcance de tus manos con la mejor interfaz.
                                    Facil de manejar y de manipular
                                </p>
                                <a href="#" class="btn btn-primary">agenda una cita para mayor informe</a>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="card bg-dark text-white">
                    <img class="card-img" src="img/dAa.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                </div>

    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="img/Cloud-Security.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/targetas.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="img/busca.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    <br>
    <div id="accordion mt-5">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Collapsible Group Item #1
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                    richardson ad
                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food
                    truck
                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                    bird on it
                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                    helvetica,
                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                    excepteur
                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth
                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                    richardson ad
                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food
                    truck
                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                    bird on it
                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                    helvetica,
                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                    excepteur
                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth
                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                    richardson ad
                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food
                    truck
                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                    bird on it
                    squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                    helvetica,
                    craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                    excepteur
                    butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth
                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 sec">
        <div class="conten bg-color">
            <div class="row">
                <div class="col-4 mt-3">
                    <img class="rounded text-center" src="<?php echo $raiz;?>img/univer.jpg" style="height: 7rem;"
                        alt="">
                </div>
                <div class="col-4 mt-3">
                <?php $anioActual = date("Y"); ?>
                    <p class="h6">atencion a clientes; 01800-362-72-88 </p>
                    <p class="h6">tel. (722)2120595</p>
                    <p class="h6"><a href="">ve nuestras solicitudes</a></p>
                    <p class="h6 mt-3"><?php echo $anioActual; ?> Grupo Financiero Univer. Derechos reservados.</p>
                </div>
                <div class="col-4 mt-3">
                    <p class="h6">estamos uvicados en</p>
                    <p class="h6">Toluca, Edo. de Mexico</p>
                    <p class="h6">Col. centro, C.P. 500000</p>
                    <p class="h6">Ignacio Lopez Rayon No.108</p>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
$(window).on('load', function() {
    $('#slider').nivoSlider();
});
</script>
<script src="js/scroll.js"></script>

<script>
    var raiz = "<?php echo $raiz;?>";
</script>
<script src="js/login-usuario.js"></script>
<script src="js/registro-usuario.js"></script>  
<?php include 'modulos/componentes/footer.php'; ?>