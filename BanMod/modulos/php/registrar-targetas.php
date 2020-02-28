<?php
    //importamos clases
    include '../../class/database.php';
    include '../../class/inserciones.php';
    include '../../class/consultas.php';
    
    //creamos objetos de las clases
    $claseInserciones = new inserciones();
    $claseConsultas = new consultas();

    $idCliente=( $_POST['noCuenta'] !== "" ) ? $_POST['noCuenta'] : null ;
    $noTarjeta=( $_POST['noTarjeta'] !== "" ) ? $_POST['noTarjeta'] : null ;
    $nombreTar = ( $_POST['nomTargeta'] !== "" ) ? $_POST['nomTargeta'] : null ;
    $fechaActual = date("Y-m-d ");
    $nip = ( $_POST['nip'] !== "" ) ? $_POST['nip'] : null ;
    $caracteristicas = ( $_POST['caracteristicas'] !== "" ) ? $_POST['caracteristicas'] : null ;
    $modelo = ( $_POST['modelo'] !== "" ) ? $_POST['modelo'] : null ;
    $saldo = ( $_POST['saldo'] !== "" ) ? $_POST['saldo'] : null ;
    

    $claseValidar = new validar();

    $errores = [];

    if($claseValidar->isName($nombreTar) === 0){
        $errores[] = "por favor ingresa un valor valido";
    }
    if ( $claseValidar->isNumero($noTarjeta) === 0 ) {
        $errores[] = "ingresa un numero valido";
    }
    if ( $claseValidar->isNumero($nip) === 0 ) {
        $errores[] = "ingresa solo numeros en el nip";
    }

    if(count($errores) === 0){
        $validarTargeta = $claseConsultas->targetaValidate($noTarjeta);
        $respuesta = null;
        if(!$validarTargeta){
            $respuesta = $claseInserciones->registrarTargeta($idCliente, $noTarjeta, $nombreTar, $fechaActual, $nip, $caracteristicas, $modelo, $saldo);
        }else{
            $respuesta["estatus"] = "error";
            $respuesta["mensaje"] = "verifique sus datos";
        }
        echo json_encode($respuesta);
    }
    else{
        echo json_encode($errores);
    }

    class validar{
        
        public function isEmpty( $string ) {
            return isset($string);
        }

        public function isName( $string ){
            $regex = "/^[a-z-A-Z\D]+$/";
            return preg_match( $regex , $string );
        }
        public function isNumero( $phone ){
            $regex = "/^[0-9-]*$/";
            return preg_match( $regex , $phone );
        }
    }