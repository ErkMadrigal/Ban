<?php
    class consultas{

        public function userValidate( $nip, $telefono , $correo ){
            $response  = null;
            $concat1  = ( $telefono == '' ) ? '' : "telefono = '$telefono'";
            $concat2  = ( $correo == '' ) ? '' : "cor_cli='$correo'";

            $sql = "SELECT * FROM cliente WHERE  ".$concat1." ". $concat2." AND nip='$nip'";
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $count = $stmt->rowCount();
                $response  = ( $count > 0  ) ? true : false;
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }   

        public function targetaValidate($noTarjeta){
            $response  = null;
            $sql = "SELECT * FROM targeta WHERE  numero_tar='$noTarjeta'";
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $count = $stmt->rowCount();
                $response  = ( $count > 0  ) ? true : false;
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        } 

        public function transaccionValidate($NoEnvio, $NoTargetaE){
            $response  = null;
            $sql = "SELECT * FROM targeta WHERE id_cli='$NoEnvio' AND numero_tar='$NoTargetaE'";
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $count = $stmt->rowCount();
                $response  = ( $count > 0  ) ? true : true;
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }
        
        public function userData( $nip, $telefono , $correo ){
            $response  = null;
            $concat1  = ( $telefono == '' ) ? '' : "telefono = '$telefono'";
            $concat2  = ( $correo == '' ) ? '' : "cor_cli='$correo'";

            $sql = "SELECT id_cli FROM cliente WHERE  ".$concat1." ". $concat2." AND nip='$nip'";
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $response  = $stmt->fetch();
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }   

        public function getDataUser( $idUser ) {
            $sql = "SELECT nom_cli FROM cliente WHERE id_cli = '$idUser'";
            $response = null;
            try{
                $claseConexion = new database();
                $stmt = $claseConexion->obtenerConexion()->query($sql);
                $response  = $stmt->fetch();
            }catch(PDOEXCEPTION $e){
                $response =  '{"error":{"text":'. $e->getMessage() .'}}';
            }
            return $response;
        }

    }
    
  
    