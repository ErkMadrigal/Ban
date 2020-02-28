<?php 
    include '../config.php'; 
    include '../../class/database.php';
    include '../../class/consultas.php';
?>
<?php session_start(); 

$idUsr = $_SESSION['uid'];
?>

    <?php if(isset($_SESSION["uid"])): ?>
        <?php
            $claseConsultas = new consultas();
            $currentUser = $claseConsultas->getDataUser($_SESSION["uid"]);
        ?>
<?php $titulo = $currentUser['nom_cli']; $mostrarMenu = true; include '../componentes/header.php';?>
<!-- Button trigger modal -->
<div class="row" style="margin-top: 9rem;">
            <div class="form-group mr-5">
                <input type="text" id="disabledTextInput" class="form-control " placeholder="Buscar">
            </div>

             <button type="button" class="btn btn-raised btn-outline-success ml-6">buscar</button>

             <button type="button" class="btn btn-raised btn-outline-info ml-5" data-toggle="modal" data-target="#exampleModalLong">
                    Tranferencia de Dinero
            </button>
</div>

<table class="table ml-5 mr-5 mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Numero Emisor</th>
      <th scope="col">Nombre Emisor</th>
      <th scope="col">Numero Receptor</th>
      <th scope="col">Nombre Receptor</th>
      <th scope="col">Cantidad ($)</th>
      <th scope="col">Fecha Transaccion</th>

    </tr>
  </thead>
  <tbody>
  <?php 
        $sql = "SELECT emisor.id_cli as idEmisor, emisor.nom_cli as nombreEmisor,receptor.id_cli as idReceptor, receptor.nom_cli as nombreReceptor, transaccion.cantidad, transaccion.fecha_tran FROM `transaccion` 
        INNER JOIN cliente as emisor ON emisor.id_cli = transaccion.enviar 
        INNER JOIN cliente as receptor ON receptor.id_cli = transaccion.recibir 
        WHERE transaccion.enviar = $idUsr ";
                $response  = null;
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $datos = $stmt->fetchAll();
                $cont = 1;
    ?>
        <?php foreach($datos as $dato):?>
     <tr>
            <td><?php echo $cont++?></td>
            <td><?php echo $dato['idEmisor']?></td>
            <td><?php echo $dato['nombreEmisor']?></td>
            <td><?php echo $dato['idReceptor']?></td>
            <td><?php echo $dato['nombreReceptor']?></td>
            <td><?php echo '$'.$dato['cantidad']?></td>
            <td><?php echo $dato['fecha_tran']?></td>
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
                                                <h5 class="modal-title" id="exampleModalLongTitle">Tranferencia</h5>
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
                                                <form class="needs-validation" novalidate id="tran">
                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <select required class="custom-select mt-3" name="metodoPago" id="metodoPago">
                                                                <option value="">Tipo de Transferencia</option>
                                                                <option value="1">pago</option>
                                                                <option value="2">Deposito</option>
                                                                <option value="3">Compra</option>
                                                            </select>
                                                            <div class="invalid-tooltip">
                                                                Por favor selecciona Metodo de pago.
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-12 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control" name="cantidad"
                                                                id="cantidad" placeholder="ingresar monto a enviar">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa el monto.
                                                            </div>
                                                        </div>

                                                        <div class="col-12 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control" name="numeroCuentaE" id="NumerocuentaE"
                                                                placeholder="ingresa tu numero de cuenta">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa tu numero de cuenta.
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control" name="numeroTargetaE" id="NTargetaEoPropio"
                                                                placeholder="ingresa tu numero de cuenta">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa tu numero de Targeta.
                                                            </div>
                                                        </div>

                                                        <div class="col-12 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control " name="numeroCuentaR" id="NumerocuentaR"
                                                                placeholder="ingresa el numero de cuenta a enviar">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa el numero de cuenta aquien envia.
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-12 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control " name="numeroTargetaR" id="numeroTargetaR"
                                                                placeholder="ingresa el numero de cuenta a enviar">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa el numero de targeta aquien envia.
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-3 ">
                                                            <button class="btn btn-raised btn-outline-warning mt-3 ">Realizar Transaccion</button>
                                                        </div>
                                                    </div>
                                            </form> 
                                            <script>var raiz = "<?php echo $raiz;?>";</script>
                                            <script src="<?php echo $raiz;?>js/registro-transacciones.js"></script>                                 
  
                                            <!-- end form-->                                           
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php include '../componentes/footer.php';?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>