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
      <th scope="col"># Cliente</th>
      <th scope="col"># Targeta</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha de Tramite</th>
      <th scope="col">nip</th>
      <th scope="col">caracteristicas</th>
      <th scope="col">modelo</th>
      <th scope="col">modificar</th>

    </tr>
  </thead>
  <tbody>
  <?php 
 $sql = "SELECT * FROM targeta WHERE id_cli=$idUsr";
           $response  = null;

               $claseConexion = new database();
               $stmt = $claseConexion->obtenerConexion()->query($sql);
               $datos = $stmt->fetchAll();
               $cont = 1;
   ?>
        <?php foreach($datos as $dato):?>
       <tr>
            <td><?php echo $cont++?></td>
            <td><?php echo $dato['id_cli']?></td>
            <td><?php echo $dato['numero_tar']?></td>
            <td><?php echo $dato['nom_tar']?></td>
            <td><?php echo $dato['fecha_tramite']?></td>
            <td><?php echo $dato['nip']?></td>
            <td><?php echo $dato['caracteristicas']?></td>
            <td><?php echo $dato['modelo']?></td>
            <td><?php echo '$  '.$dato['saldo']?></td>
    </tr>
        <?php endforeach;?>
  </tbody>
</table>
<?php include '../componentes/footer.php';?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>