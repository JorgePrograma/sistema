
<?php include "vistaGeneral.php";
    if($_SESSION['rol_log']=="Estudiante"){
        session_unset();
         session_destroy();  
     header("Location: index.php");
     }?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <form class="" action="productoAgregar.php" method="POST" autocomplete="off">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> &nbsp; Información producto</legend>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_codigo"
                                                    class="bmd-label-floating">Codigo</label>
                                                <input type="text" pattern="[0-9-]{1,9}" class="form-control"
                                                    name="producto_codigo_reg" id="producto_codigo"
                                                    maxlength="9" required="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                            <div class="form-group">
                                                <label for="producto_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}"
                                                    class="form-control" name="producto_nombre_reg" id="producto_nombre"
                                                    maxlength="20">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="producto_foto" class="bmd-label-floating">Foto</label>
                                                <input type="file"  class="form-control"
                                                    name="producto_foto_reg" id="producto_foto">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="producto_cantidad"
                                                    class="bmd-label-floating">Cantidad</label>
                                                <input type="text" pattern="[0-9-]{1,8}" class="form-control"
                                                    name="producto_cantidad_reg" id="producto_cantidad" maxlength="8">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_precio" class="bmd-label-floating">Precio</label>
                                                <input type="text" class="form-control" pattern="[0-9-]{1,11}" name="producto_precio_reg"
                                                    id="producto_precio" maxlength="11">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label for="producto_estado" class="bmd-label-floating">Estado</label>
                                                <select name="producto_estado_reg" id="input" class="form-control"
                                                    required="required">
                                                    <option value="Activo">Activo</option>
                                                    <option value="Desactivado">Desactivado</option>
                                                </select>
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