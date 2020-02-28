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

<table class="table ml-3 mr-3"  style="margin-top: 9rem;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Envio</th>
      <th scope="col">Apellido Envio</th>
      <th scope="col"># Tarjeta</th>
      <th scope="col">Modelo</th>
      <th scope="col">Monto</th>
      <th scope="col"># de Cuenta Destino</th>
      <th scope="col"># de Tarjeta Destio</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = "SELECT cliente.nom_cli, cliente.ap_cli, targeta.numero_tar, targeta.modelo, 
        transaccion.cantidad, transaccion.recibir, transaccion.noTargetaR
        FROM transaccion
        INNER JOIN targeta
        INNER JOIN cliente
        ON transaccion.enviar=cliente.id_cli WHERE targeta.id_tar=$idUsr";
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
            <td><?php echo $dato['modelo']?></td>
            <td><?php echo $dato['cantidad']?></td>
            <td><?php echo $dato['recibir']?></td>
            <td><?php echo $dato['noTargetaR']?></td>
    </tr>
        <?php endforeach;?>
  </tbody>
</table>


<?php include '../componentes/footer.php';?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>