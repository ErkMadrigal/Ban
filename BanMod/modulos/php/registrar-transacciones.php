<?php
session_start();
$idUsr = $_SESSION['uid'];
    //importamos clases
    include '../../class/database.php';
    include '../../class/inserciones.php';
    include '../../class/consultas.php';
    include '../../class/modificaciones.php';
    
    //creamos objetos de las clases
    $claseInserciones = new inserciones();
    $claseConsultas = new consultas();
    $claseModificaciones = new modificaciones();

    $TipoTran=( $_POST['metodoPago'] !== "" ) ? $_POST['metodoPago'] : null ;
    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $fechaActual = date("Y-m-d H:i:s");
    $cantidad = ( $_POST['cantidad'] !== "" ) ? $_POST['cantidad'] : null ;
    $NoEnvio = ( $_POST['numeroCuentaE'] !== "" ) ? $_POST['numeroCuentaE'] : null ;
    $NoRecibo = ( $_POST['numeroCuentaR'] !== "" ) ? $_POST['numeroCuentaR'] : null ;
    $NoTargetaE = ( $_POST['numeroTargetaE'] !== "" ) ? $_POST['numeroTargetaE'] : null ;
    $NoTargetaR = ( $_POST['numeroTargetaR'] !== "" ) ? $_POST['numeroTargetaR'] : null ;
    

    $claseValidar = new validar();

    $errores = [];

    $respuesta = null;
    if ( $claseValidar->isNumero($cantidad) === 0 ) {
        $errores[] = "ingresa un numero valido";
    }
    if ( $claseValidar->isNumero($NoEnvio) === 0 ) {
        $errores[] = "ingresa solo los digitos de la Cuenta a quien desea Enviar";
    }
    if ( $claseValidar->isNumero($NoRecibo) === 0 ) {
        $errores[] = "ingresa solo numeros en el Cuenta a quien desea Resivir";
    }
    if ( $claseValidar->isNumero($NoTargetaE) === 0 ) {
        $errores[] = "ingresa solo los digitos de la Tarjeta a quien desea Enviar";
    }
    if ( $claseValidar->isNumero($NoTargetaR) === 0 ) {
        $errores[] = "ingresa solo numeros en el Tarjeta a quien desea Resivir";
    }
    if(count($errores) === 0){
        $transaccionTargeta = $claseConsultas->transaccionValidate($NoEnvio, $NoTargetaE);
        if($transaccionTargeta){
            $respuesta = $claseInserciones->registrarTransaccion($TipoTran, $fechaActual, $cantidad, $NoEnvio, $NoRecibo, $NoTargetaE, $NoTargetaR);
            if($respuesta['estado'] === "ok"){
                $respuesta = $claseModificaciones->ModificarMontoTarE($cantidad, $NoTargetaE);
                if($respuesta['estado'] === "ok"){
                   $respuesta = $claseModificaciones->ModificarMontoTarR($cantidad, $NoTargetaR);
                }
            }
        } else{
            $respuesta["estatus"] = "error";
            $respuesta["mensaje"] = "verifique sus datos";
        }
        
    }else{
        $respuesta = $errores;
        
    } 
    echo json_encode($respuesta);
    //echo json_encode($errores);

    class validar{
        
        public function isEmpty( $string ) {
            return isset($string);
        }

        public function isNumero( $phone ){
            $regex = "/^[0-9-]*$/";
            return preg_match( $regex , $phone );
        }
    }