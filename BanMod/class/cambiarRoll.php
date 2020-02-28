<?php 
include '../class/database.php';
$claseDataBase = new database();
$roll = $_POST['roll']; 
$idUsuario = $_POST['idUsuario'];
$respuesta = null;

try{
    $sql="UPDATE cliente SET roll= $roll WHERE id_cli= $idUsuario";
     $claseDataBase->obtenerConexion()->query($sql);
     $respuesta['estado'] = 'ok';
     $respuesta['mensaje'] = "Se le cambio el roll corectamente al usr";
     
}catch(PDOEXCEPTION $e){
    $respuesta['estado'] = 'error';
    $respuesta['mensaje'] = $e->getMessage();
}

echo json_encode($respuesta);