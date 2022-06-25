<?php include "vistaGeneral.php";
    if($_SESSION['rol_log']=="Estudiante"){
       session_unset();
        session_destroy();  
	header("Location: index.php");
    }
?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <form class="" action="usuarioAgregar.php" method="POST" autocomplete="off">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="identificacion_reg2"
                                                    class="bmd-label-floating">Identificacion</label>
                                                <input type="text" pattern="[0-9-]{8,10}" class="form-control"
                                                    name="usuario_identificacion_reg2" id="identificacion_reg2"
                                                    maxlength="10" required="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                            <div class="form-group">
                                                <label for="usuario_nombre" class="bmd-label-floating">Nombres</label>
                                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}"
                                                    class="form-control" name="usuario_nombre_reg2" id="usuario_nombre"
                                                    maxlength="40">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="usuario_foto" class="bmd-label-floating">Foto</label>
                                                <input type="file" pattern="[0-9()+]{8,10}" class="form-control"
                                                    name="usuario_foto_reg2" id="usuario_foto" maxlength="10">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="usuario_telefono"
                                                    class="bmd-label-floating">Teléfono</label>
                                                <input type="text" pattern="[0-9()+]{8,10}" class="form-control"
                                                    name="usuario_telefono_reg2" id="usuario_telefono" maxlength="10">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="usuario_email" class="bmd-label-floating">Email</label>
                                                <input type="email" class="form-control" name="usuario_email_reg2"
                                                    id="usuario_email_reg2" maxlength="50">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label for="usuario_sexo" class="bmd-label-floating">Sexo</label>
                                                <select name="usuario_sexo_reg2" id="input" class="form-control"
                                                    required="required">
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label for="usuario_rol" class="bmd-label-floating">Roles</label>
                                                <select name="usuario_rol_reg2" id="input" class="form-control"
                                                    required="required">
                                                    <?php if($_SESSION['rol_log']=="Administrador"){?>
                                                    <option name="Administrador" value="Administrador">Administrador
                                                <?php }?>    
                                                </option>
                                                    <option name="Docente" value="Docente">Docente</option>
                                                    <?php if($_SESSION['rol_log']=="Administrador"){?><option name="Estudiante" value="Estudiante">Estudiante</option>
                                             <?php }?>   </select>
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
                                                    name="usuario_usuario_reg2" id="usuario_usuario" maxlength="35"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="usuario_clave_reg2"
                                                    class="bmd-label-floating">Contraseña</label>
                                                <input type="password" class="form-control" name="usuario_clave_reg2"
                                                    id="usuario_clave_reg2" pattern="[a-zA-Z0-9$@.-]{7,100}"
                                                    maxlength="100" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <p class="text-center" style="margin-top: 40px;">
                                <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i
                                        class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
                                &nbsp; &nbsp;
                                <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i>
                                    &nbsp; GUARDAR</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            <?php include "footer.php";?>