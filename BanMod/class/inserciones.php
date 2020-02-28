<?php
    class inserciones{

        public function registrarUsuario($nombre , $apellido , $correo , $telefono , 
                                        $activo , $estatus , $referencia1, $referencia2, $referencia3 ,
                                         $ref_tel1, $ref_tel2, $ref_tel3 , $fechaNac , $genero, $nip ){
            $respuesta = null;
            $sql = "INSERT INTO  cliente (nom_cli, ap_cli, cor_cli, telefono, activo, roll, 
            referencia1, referencia2, referencia3, ref_tel1, ref_tel2, ref_tel3, fecha_nacim, genero, nip) 
                                           values (:nom_cli, :ap_cli, :cor_cli, :telefono, :activo, :roll, 
            :referencia1, :referencia2, :referencia3, :ref_tel1, :ref_tel2, :ref_tel3, :fecha_nacim, :genero, :nip)";
            try {
                $claseConexion = new database();
                $db = $claseConexion->obtenerConexion();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":nom_cli", $nombre);
                $stmt->bindParam(":ap_cli", $apellido);
                $stmt->bindParam(":cor_cli", $correo);
                $stmt->bindParam(":telefono", $telefono);
                $stmt->bindParam(":activo", $activo);
                $stmt->bindParam(":roll", $estatus);
                $stmt->bindParam(":referencia1", $referencia1);
                $stmt->bindParam(":referencia2", $referencia2);
                $stmt->bindParam(":referencia3", $referencia3);
                $stmt->bindParam(":ref_tel1", $ref_tel1);
                $stmt->bindParam(":ref_tel2", $ref_tel2);
                $stmt->bindParam(":ref_tel3", $ref_tel3);
                $stmt->bindParam(":fecha_nacim", $fechaNac );
                $stmt->bindParam(":genero", $genero);
                $stmt->bindParam(":nip", $nip);
                $stmt->execute();
                $respuesta['estado'] = "ok";
                $respuesta['mensaje'] = "Se creo correctamente el usuario";
            } 
            catch (PDOEXCEPTION $e) {
                $respuesta['estado'] = "error";
                $respuesta['mensaje']  = $e->getMessage();
            }
            return $respuesta;
        }

        public function registrarTargeta($idCliente, $numero_tar, $nombreTar, $fechaActual, $nip, $caracteristicas,
                                        $modelo, $saldo){
            $respuesta = null;
            $sql = "INSERT INTO targeta (id_cli, numero_tar, nom_tar, fecha_tramite, nip, caracteristicas, modelo, saldo) 
                    values (:id_cli, :numero_tar, :nom_tar, :fecha_tramite, :nip, :caracteristicas, :modelo, :saldo)";
            try {
                $claseConexion = new database();
                $db = $claseConexion->obtenerConexion();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":id_cli",$idCliente);
                $stmt->bindParam(":numero_tar",$numero_tar);
                $stmt->bindParam(":nom_tar",$nombreTar);
                $stmt->bindParam(":fecha_tramite",$fechaActual);
                $stmt->bindParam(":nip",$nip);
                $stmt->bindParam(":caracteristicas",$caracteristicas);
                $stmt->bindParam(":modelo",$modelo);
                $stmt->bindParam(":saldo",$saldo);
                $stmt->execute();
                $respuesta['estado'] = "ok";
                $respuesta['mensaje'] = "Se creo correctamente la targeta";
            } 
            catch (PDOEXCEPTION $e) {
                $respuesta['estado'] = "error";
                $respuesta['mensaje']  = $e->getMessage();
            }
            return $respuesta;
        }
        
        public function registrarTransaccion($TipoTran, $fechaActual, $cantidad, $NoEnvio, $NoRecibo, $NoTargetaE, $NoTargetaR){
            $sql = "INSERT INTO transaccion (tipo_tran, fecha_tran, cantidad, enviar, recibir, noTargetaE, noTargetaR) 
                    values (:tipo_tran, :fecha_tran, :cantidad, :enviar, :recibir, :noTargetaE, :noTargetaR) ";
            $respuesta = null;
            
            try {
                $claseConexion = new database();
                $db = $claseConexion->obtenerConexion();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":tipo_tran",$TipoTran);
                $stmt->bindParam(":fecha_tran",$fechaActual);
                $stmt->bindParam(":cantidad",$cantidad);
                $stmt->bindParam(":enviar",$NoEnvio);
                $stmt->bindParam(":recibir",$NoRecibo);
                $stmt->bindParam(":noTargetaE",$NoTargetaE);
                $stmt->bindParam(":noTargetaR",$NoTargetaR);
                $stmt->execute();
                $respuesta['estado'] = "ok";
                $respuesta['mensaje'] = "Su transaccion se realizo correctamente";
            } 
            catch (PDOEXCEPTION $e) {
                $respuesta['estado'] = "error";
                $respuesta['mensaje']  = $e->getMessage();
            }
            return $respuesta;
        }
    }