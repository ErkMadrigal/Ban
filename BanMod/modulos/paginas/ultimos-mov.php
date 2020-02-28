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

<table class="table"  style="margin-top: 9rem;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Envio</th>
      <th scope="col">ApellidoEnvio</th>
      <th scope="col"># Tarjeta</th>
      <th scope="col">Modelo</th>
      <th scope="col">Nombre Tarjeta</th>
      <th scope="col">Saldo Actual</th>
      <th scope="col">Tipo Transaccion</th>
      <th scope="col">Cantidad</th>
      <th scope="col"># de Cuenta Envio</th>
      <th scope="col"># de Cuenta Destino</th>
      <th scope="col"># de Tarjeta Envio</th>
      <th scope="col"># de Tarjeta Destio</th>

    </tr>
  </thead>
  <tbody>
    <?php 
        $sql = "SELECT cliente.nom_cli, cliente.ap_cli, targeta.numero_tar, targeta.modelo, targeta.nom_tar, 
        targeta.saldo, transaccion.tipo_tran, transaccion.cantidad, transaccion.enviar, transaccion.recibir, 
        transaccion.noTargetaE, transaccion.noTargetaR
        FROM transaccion
        INNER JOIN targeta
        INNER JOIN cliente
        ON transaccion.enviar=cliente.id_cli WHERE cliente.id_cli= $idUsr";
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
            <td><?php echo $dato['nom_tar']?></td>
            <td><?php echo $dato['saldo']?></td>
            <td><?php echo $dato['tipo_tran']?></td>
            <td><?php echo $dato['cantidad']?></td>
            <td><?php echo $dato['enviar']?></td>
            <td><?php echo $dato['recibir']?></td>
            <td><?php echo $dato['noTargetaE']?></td>
            <td><?php echo $dato['noTargetaR']?></td>
    </tr>
        <?php endforeach;?>
  </tbody>
</table>


<?php include '../componentes/footer.php';?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>