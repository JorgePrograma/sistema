<?php
$nombre=$_POST['producto_id_actualizar'];   
?>


<?php include "vistaGeneral.php";

    if($_SESSION['rol_log']=="Estudiante"){
        session_unset();
        session_destroy();  
        header("Location: index.php");
     };
     ?>
                <div class="container-fluid">
                    <?php 
                          ini_set('display_errors', 1);
                          error_reporting(E_ALL); 
                          require "basedatos.php";
                          $iden=$nombre;
                          $ob = new basedatos();
                           $validarID=$ob->get_data("SELECT * FROM productos WHERE codigo='".$iden."'");
                           $array=$validarID['DATA'];
                           if(count($array)>0){
                        ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                         <form action="productoActualizar.php" method="POST" autocomplete="off">
                         <input type="hidden" name="producto_id_actualizar" value="<?php $nombre?>">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> &nbsp; Información producto</legend>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_codigo"
                                                    class="bmd-label-floating">Codigo</label>
                                                <input type="text" pattern="[0-9-]{1,10}" class="form-control"
                                                    name="producto_codigo_act" id="producto_codigo"
                                                    maxlength="10" required="" value="<?php echo $array[0]['codigo']?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                            <div class="form-group">
                                                <label for="producto_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}"
                                                    class="form-control" name="producto_nombre_act" id="producto_nombre"
                                                    maxlength="20" value="<?php echo $array[0]['nombre']?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="producto_foto" class="bmd-label-floating">Foto</label>
                                                <input type="file"  class="form-control"
                                                    name="producto_foto_act" id="producto_foto" value="<?php echo $array[0]['foto']?>" >
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="producto_cantidad"
                                                    class="bmd-label-floating">Cantidad</label>
                                                <input type="text" pattern="[0-9-]{1,9}" class="form-control"
                                                    name="producto_cantidad_act" id="producto_cantidad" maxlength="9"
                                                    value="<?php echo $array[0]['cantidad']?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_precio" class="bmd-label-floating">Precio</label>
                                                <input type="text" class="form-control" pattern="[0-9-]{1,12}" name="producto_precio_act"
                                                    id="producto_precio" maxlength="12" value="<?php echo $array[0]['precio']?>">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label for="producto_estado" class="bmd-label-floating">Estado</label>
                                                <select name="producto_estado_act" id="input" class="form-control"
                                                    required="required">
                                                    <option value="Activo" value="<?php if($array[0]['estado']=="Activo"){ echo 'selected=""';}?>">Activo</option>
                                                    <option value="Desactivado" <?php if($array[0]['estado']=="Desactivado"){ echo 'selected=""';}?>>Desactivado</option>
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
                    <?php }?>
                </div>
            </div>
           <?php include "footer.php";?>


         