<?php
$nombre=$_POST['usuario_id_actualizar'];   
?>

<?php include "vistaGeneral.php";?>
<div class="container-fluid">
    <?php 
                          ini_set('display_errors', 1);
                          error_reporting(E_ALL); 
                          require "basedatos.php";
                          $iden=$nombre;
                          $ob = new basedatos();
                           $validarID=$ob->get_data("SELECT * FROM usuarios WHERE identificacion='".$iden."'");
                           $array=$validarID['DATA'];
                           if(count($array)>0){
                        ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
        <form action="usuarioActualizar.php" method="POST" autocomplete="off">
            <fieldset>
                <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="identificacion_act" class="bmd-label-floating">Identificacion</label>
                                <input type="text" pattern="[0-9-]{8,10}" class="form-control"
                                    name="usuario_identificacion_act" id="identificacion_act" maxlength="10" required=""
                                    value="<?php echo $array[0]['identificacion']?> " readonly="">
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label for="usuario_nombre" class="bmd-label-floating">Nombres</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control"
                                    name="usuario_nombre_act" id="usuario_nombre" maxlength="40"
                                    value="<?php echo $array[0]['nombre']?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="usuario_foto" class="bmd-label-floating">Foto</label>
                                <input type="file" pattern="[0-9()+]{8,10}" class="form-control" name="usuario_foto_act"
                                    id="usuario_foto" maxlength="10">
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="usuario_telefono" class="bmd-label-floating">Teléfono</label>
                                <input type="text" pattern="[0-9()+]{8,10}" class="form-control"
                                    name="usuario_telefono_act" id="usuario_telefono" maxlength="10"
                                    value="<?php echo $array[0]['telefono']?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="usuario_email" class="bmd-label-floating">Email</label>
                                <input type="email" class="form-control" name="usuario_email_act" id="usuario_email_act"
                                    maxlength="50" value="<?php echo $array[0]['email']?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="usuario_sexo" class="bmd-label-floating">Sexo</label>
                                <select name="usuario_sexo_act" id="input" class="form-control" required="required">
                                    <option value="Masculino"
                                        <?php if($array[0]['sexo']=="Masculino"){ echo 'selected=""';}?>>
                                        Masculino</option>
                                    <option value="Femenino"
                                        <?php if($array[0]['sexo']=="Femenino"){ echo 'selected=""';}?>>
                                        Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <?php  if($_SESSION['rol_log']=="Administrador" ){}?>
                                <label for="usuario_rol" class="bmd-label-floating">Roles</label>
                                <select name="usuario_rol_act" id="input" class="form-control" required="required">
                                    <option name="Administrador" value="Administrador"
                                        <?php if($array[0]['rol']=="Administrador"){ echo 'selected=""';}?>>
                                        Administrador
                                    </option>
                                    <option name="Docente" value="Docente"
                                        <?php if($array[0]['rol']=="Docente"){ echo 'selected=""';}?>>
                                        Docente</option>
                                    <option name="Estudiante" value="Estudiante"
                                        <?php if($array[0]['rol']=="Estudiante"){ echo 'selected=""';}?>>
                                        Estudiante</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
            <br><br><br>
            <fieldset>
                <legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="usuario_usuario" class="bmd-label-floating">Nombre de
                                    usuario</label>
                                <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control"
                                    name="usuario_usuario_act" id="usuario_usuario" maxlength="35" required=""
                                    value="<?php echo $array[0]['usuario']?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="usuario_clave_act" class="bmd-label-floating">Contraseña</label>
                                <input type="password" class="form-control" name="usuario_clave_act"
                                    id="usuario_clave_act" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required=""
                                    value="<?php echo $array[0]['contraseña']?>">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <br>
            <p class="text-center" style="margin-top: 40px;">
                <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i>
                    &nbsp; Actualizar</button>
            </p>
        </form>
    </div>
    <?php }?>
</div>
</div>
           <?php include "footer.php";?>