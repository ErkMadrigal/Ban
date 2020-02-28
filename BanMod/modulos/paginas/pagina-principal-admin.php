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
       
			

<?php include "../componentes/footer.php";?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>