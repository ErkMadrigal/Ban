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
        <?php $titulo = $currentUser['nom_cli'].' admin'; $mostrarMenuRoot = true; include "../componentes/header-admin.php"; ?>
       <!-- Button trigger modal -->
       <div class="col-12 float-left">
            <button type="button" class="btn  btn-raised btn-outline-warning font-family float-left" data-toggle="modal"
                                    data-target="#exampleModalLong">
                                    ingresar Usr
                                </button>
        </div>
        <div class="table-responsive">
            <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">correo</th>
                <th scope="col">telefono</th>
                <th scope="col">activo</th>
                <th scope="col">roll</th>
                <th scope="col">referencia1</th>
                <th scope="col">referencia2</th>
                <th scope="col">referencia3</th>
                <th scope="col"> telefono referencia 1</th>
                <th scope="col">telefono referencia 2</th>
                <th scope="col">telefono referencia 3</th>
                <th scope="col">fecha de nacimiento</th>
                <th scope="col">genero</th>
                <th scope="col">Dar de baja</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM cliente WHERE id_cli != '$idUsr' ORDER BY `cliente`.`id_cli` ASC";
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
                                <td><?php echo $dato['cor_cli']?></td>
                                <td><?php echo $dato['telefono']?></td>
                                <td><?php echo ($dato['activo'] === "1") ? 'activo' : 'no activo';?></td>
                                <td> 
                                <select class="custom-select" style="width: 10rem;" id="select<?php echo $dato['id_cli'];?>"  onchange="cambiarRoll(this.value,<?php echo $dato['id_cli']?>)">
                                    <option value="1" <?php echo ($dato['roll'] == 1) ? 'selected' : ''; ?> >Cliente</option>
                                    <option value="2" <?php echo ($dato['roll'] == 2) ? 'selected' : '';  ?>>Administrador</option>
                                </select>  <!--<?php echo ($dato['roll'] === "1" ) ? 'Cliente' : 'Administrador';?>--></td>
                                <td><?php echo $dato['referencia1']?></td>
                                <td><?php echo $dato['referencia2']?></td>
                                <td><?php echo $dato['referencia3']?></td>
                                <td><?php echo $dato['ref_tel1']?></td>
                                <td><?php echo $dato['ref_tel2']?></td>
                                <td><?php echo $dato['ref_tel3']?></td>
                                <td><?php echo $dato['fecha_nacim']?></td>
                                <td><?php echo ($dato['genero'] === "1") ? 'Hombre' : 'Mujer'; ?></td>
                                <td>
                                    <button type="button" class="btn btn-raised btn-outline-warning ml-5" data-toggle="modal" data-target="#">
                                         Dar de baja
                                    </button>
                                </td>
                                
                        </tr>
                    <?php endforeach;?>
            </tbody>
            </table>
        </div>
       <!-- Modal -->
       <div class="modal fade" id="exampleModalLong"  tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title font-weight-bold h2" id="exampleModalLongTitle">Registra un usr</h1>                                                
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--form-->
                                                <div class="container-fluid">
                                            <div class="alert alert-success mt-4" id="respuestaCorrecta" role="alert">

                                            </div>
                                            <div class="alert alert-danger" id="respuestaErronea"  role="alert">

                                            </div>
                                                    <form class="needs-validation" novalidate id="registrar">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control" name="nombre" id="nombre"
                                                                placeholder="Nombre">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa el nombre.
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control " name="apellido" id="apellido"
                                                                placeholder="Apellido">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa el apellido.
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <input required type="text" class="form-control  mt-3"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                name="numeroOCorreo" placeholder="Número celular o correo electrónico">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa un correo o telefono.
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <input required type="text" class="form-control  mt-3"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                name="referencia_1" id="referencia_1" placeholder="Referencia 1">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa tu referencia.
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control " name="ref_telefono1" id="ref_telefono1" placeholder="Telefono">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa un telefono.
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <input required type="text" class="form-control  mt-3"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                name="referencia_2" id="referencia_2" placeholder="Referencia 2">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa tu referencia.
                                                            </div>
                                                        </div>
                                                        <div class="col-4 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control " name="ref_telefono2" id="ref_telefono2" placeholder="Telefono">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa un telefono.
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <input required type="text" class="form-control  mt-3"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                name="referencia_3" id="referencia_3" placeholder="referencia_3">
                                                        </div>
                                                        <div class="col-4 mt-3">
                                                            <input required type="text"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;"
                                                                class="form-control " placeholder="Telefono"
                                                                name="ref_telefono3" id="ref_telefono3">
                                                        </div>
                                                        <div class="col-12">
                                                            <h3 class="h6 mt-3">Fecha de nacimiento</h3>
                                                            <div class="form-row">
                                                                <div class="col-4">
                                                                    <select required class="custom-select" name="dia" id="dia">
                                                                        <option value="">Día</option>
                                                                        <?php for( $i=0 ; $i < 31 ; $i++ ): ?>
                                                                        <option value="<?php echo ( $i + 1 ); ?>">
                                                                            <?php echo ( $i + 1 ); ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        Por favor selecciona tu dia de
                                                                        nacimiento.
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <?php
                                    $meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
                                                                     ?>
                                                                    <select required class="custom-select" name="mes" id="mes">
                                                                        <option value="">Mes</option>
                                                                        <?php for( $i=0 ; $i < 12 ; $i++ ): ?>
                                                                        <option value="<?php echo ( $i + 1 ); ?>">
                                                                            <?php echo strtolower($meses[$i]); ?>
                                                                        </option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        Por favor selecciona tu mes de
                                                                        nacimiento.
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <?php $anioActual = date("Y"); ?>
                                                                    <select required class="custom-select" name="anio" id="anio">
                                                                        <option value="">Año</option>
                                                                        <?php for( $i = $anioActual ; $i > 1904 ; $i-- ): ?>
                                                                        <option value="<?php echo $i; ?>">
                                                                            <?php echo $i; ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        Por favor selecciona tu año de
                                                                        nacimiento.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <select required class="custom-select mt-3" name="genero" id="genero"
                                                                id="genero">
                                                                <option value="">Elige sexo</option>
                                                                <option value="1">Mujer</option>
                                                                <option value="2">Hombre</option>
                                                            </select>
                                                            <div class="invalid-tooltip">
                                                                Por favor selecciona tu genero de nacimiento.
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <input required type="password" class="form-control  mt-3"
                                                                style="background: white;border-radius: 3px; border: 1px solid #bdc7d8;" name="nip"
                                                                placeholder="nip">
                                                            <div class="invalid-tooltip">
                                                                Por favor ingresa tu nip.
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-12">
                                                            <button class="btn btn-raised btn-success mt-3">Registrarte</button>
                                                        </div>
                                                    </div>
                                                </form>
    </div>    
<script>
    var raiz = "<?php echo $raiz;?>";
</script>
<script src="<?php echo $raiz;?>js/login-usuario.js"></script>
<script src="<?php echo $raiz;?>js/registro-usuario.js"></script>                                 
                             
                                                <!--end form-->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

			
<script >
    const cambiarRoll = (roll,idUsuario) => {
        let dataForm = new FormData();
        dataForm.append('idUsuario',idUsuario);
        dataForm.append('roll',roll);
        fetch("../../class/cambiarRoll.php",{
            method : "POST",
            body : dataForm
        })
        
        .then((resp)=>resp.json())
        .then((data)=>{
            if(data.estado === 'ok'){
                location.reload();
            }   else{
                console.log(data)
            }
        })
    }
</script>
<?php include "../componentes/footer.php";?>
<?php else:?>
            <p>error 404</p>
    <?php endif;?>