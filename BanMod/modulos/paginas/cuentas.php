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
<?php $titulo = $currentUser['nom_cli'] ; $mostrarMenu = true; include '../componentes/header.php';?>

<table class="table ml-5 mr-5"  style="margin-top: 9rem;">
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
                ON targeta.id_cli = cliente.id_cli WHERE cliente.id_cli= $idUsr";
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
            <button type="button" class="btn btn-raised btn-outline-warning ml-5" data-toggle="modal" data-target="#exampleModalLong">
                            modificar
                            </button>
            </td>
    </tr>
        <?php endforeach;?>
  </tbody>
</table>


<!-- Modal Modificar-->
<div class="modal fade" id="exampleModalLong"  tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modificar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--form-->
                                                <form class="needs-validation" novalidate id="registrar">
                                                    <div class="form-row">

                                                     </div>
                                                </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php include '../componentes/footer.php';?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>