<?php
    class modificaciones{
        public function ModificarMontoTarE($monto, $noTargetaE){
            $sql = "UPDATE targeta SET saldo=saldo-:saldo WHERE numero_tar=:numero_tar";
            $respuesta = null;

            try{
                $claseConexion = new database();
                $db = $claseConexion->obtenerConexion();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":saldo", $monto);
                $stmt->bindParam(":numero_tar", $noTargetaE);
                $stmt->execute();
                $respuesta['estado'] = "ok";
            } 
            catch (PDOEXCEPTION $e) {
                $respuesta['estado'] = "error";
                $respuesta['mensaje']  = $e->getMessage();
            }
            return $respuesta;
    }
    public function ModificarMontoTarR($monto, $noTargetaR){
        $sql = "UPDATE targeta SET saldo=saldo+:saldo WHERE numero_tar=:numero_tar";
        $respuesta = null;

        try{
            $claseConexion = new database();
            $db = $claseConexion->obtenerConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":saldo", $monto);
            $stmt->bindParam(":numero_tar", $noTargetaR);
            $stmt->execute();
            $respuesta['estado'] = "ok";
            $respuesta['mensaje'] = "la transaccion se realizo correctamente";

            
        } 
        catch (PDOEXCEPTION $e) {
            $respuesta['estado'] = "error";
            $respuesta['mensaje']  = $e->getMessage();
        }

        return $respuesta;
    }
}