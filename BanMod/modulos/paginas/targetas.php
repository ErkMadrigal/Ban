<?php 
    include '../config.php'; 
    include '../../class/database.php';
    include '../../class/consultas.php';
?>

<?php session_start(); ?>
    <?php if(isset($_SESSION["uid"])): ?>
    <?php
            $claseConsultas = new consultas();
            $currentUser = $claseConsultas->getDataUser($_SESSION["uid"]);
        ?>
        <?php $titulo = $currentUser['nom_cli'].' admin'; $mostrarMenuRoot = true; include "../componentes/header-admin.php"; ?>
<!-- Button trigger modal -->
<div class="col-12 mt-3">
    <button type="button" class="btn btn-raised btn-outline-warning font-family" data-toggle="modal"
        data-target="#exampleModalLong">
        ingresar targeta
    </button>
</div>
<!-- end the Button trigger modal -->

<table class="table ml-5 mr-5"  style="margin-top: 3rem;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col"># Tarjeta</th>
      <th scope="col">Nip</th>
      <th scope="col">Nombre Tarjeta</th>
      <th scope="col">caracteristicas</th>
      <th scope="col">modelo</th>
      <th scope="col">saldo</th>
      <th scope="col">modificar</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = "SELECT cliente.nom_cli, cliente.ap_cli, targeta.numero_tar, cliente.nip, targeta.nom_tar, targeta.caracteristicas, targeta.modelo, targeta.saldo 
                FROM cliente 
                INNER JOIN targeta 
                ON targeta.id_cli = cliente.id_cli";
                $response  = null;
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $datos = $stmt->fetchAll();
                $cont = 1;
    ?>
        <?php foreach($datos as $dato):?>
    <tr>
            <td><?php echo $cont++?></td>
            <td><?php echo $dato['nom_cli']?></td>
            <td><?php echo $dato['ap_cli']?></td>
            <td><?php echo $dato['numero_tar']?></td>
            <td><?php echo $dato['nip']?></td>
            <td><?php echo $dato['nom_tar']?></td>
            <td><?php echo $dato['caracteristicas']?></td>
            <td><?php echo $dato['modelo']?></td>
            <td><?php echo '$  '.$dato['saldo']?></td>
            <td>
            <button type="button" class="btn btn-raised btn-outline-warning ml-5" data-toggle="modal" data-target="#">
                            modificar
                            </button>
            </td>
    </tr>
        <?php endforeach;?>
  </tbody>
</table>
       <!-- Modal -->
       <div class="modal fade" id="exampleModalLong"  tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title font-weight-bold h2" id="exampleModalLongTitle">Crear una Nueva Targeta</h1>                                                
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--form-->
                                                <div class="container-fluid">
    <div class="alert alert-success mt-4" id="respuestaCorrecta" role="alert">

    </div>
    <div class="alert alert-danger" id="respuestaErronea"  role="alert">

    </div>
            <form class="needs-validation" novalidate id="reg">
            <div class="row">
            <div class="col-12 mt-2">
                    <input required type="text"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control" name="noCuenta" id="noCuenta"
                        placeholder="numero de cuenta">
                    <div class="invalid-tooltip">
                        Por favor ingresa numero de Cuenta.
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <input required type="text"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control" name="noTarjeta" id="noTarjeta"
                        placeholder="numero de cuenta">
                    <div class="invalid-tooltip">
                        Por favor ingresa numero de la targeta.
                    </div>
                </div>
            <div class="col-12 mt-2">
                    <input required type="text"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control" name="nomTargeta" id="nomTargeta"
                        placeholder="nombre de targeta">
                    <div class="invalid-tooltip">
                        Por favor ingresa el nombre de Targeta.
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <input required type="password"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control " name="nip" id="nip"
                        placeholder="nip de la Targeta">
                    <div class="invalid-tooltip">
                        Por favor ingresa el nip de la Targeta.
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <input required type="text"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control" name="caracteristicas" id="caracteristicas"
                        placeholder="carcateristicas de la targeta">
                    <div class="invalid-tooltip">
                        Por favor ingresa las caracteristicas de la Targeta.
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <input required type="text"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control" name="modelo" id="modelo"
                        placeholder="modelo de la targeta">
                    <div class="invalid-tooltip">
                        Por favor ingresa el modelo de la Targeta.
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <input required type="text"
                        style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                        class="form-control" name="saldo" id="saldo"
                        placeholder="saldo de la targeta">
                    <div class="invalid-tooltip">
                        Por favor ingresa el saldo de la Targeta.
                    </div>
                </div>                                 
                    <div class="col-12">
                        <button class="btn btn-raised btn-success mt-3">Registrarte</button>
                    </div>
                </div>
            </form>
    </div>    
    <script>var raiz = "<?php echo $raiz;?>";</script>
<script src="<?php echo $raiz;?>js/registro-targetas.js"></script>                                 
                             
                                                <!--end form-->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

			
                                            
<?php include "../componentes/footer.php";?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>