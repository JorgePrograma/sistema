<?php include "vistaGeneral.php";?>
                <div class="container-fluid">
                <?php if(isset($errorEliminar)){
                    if($errorEliminar=="Eliminado exitosamente"){
                        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                          '.$errorEliminar.'
                        </div>
                      </div>';
                    }else{
                        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                          '.$errorEliminar.'
                        </div>
                      </div>';
                    }
                 }?> 
                    <div class="table-responsive">
                        <table class="table table-dark table-sm">
                            <thead>
                                <tr class="text-center roboto-medium">

                                    <th>CODIGO</th>
                                    <th class="col-2">NOMBRE</th>
                                    <th>CANTIDAD</th>
                                    <th>PRECIO</th>
                                    <th>ESTADO</th>
                                    <?php if($_SESSION['rol_log']!="Estudiante"){?>
                                    <th>ACTUALIZAR</th>
                                    <th>ELIMINAR</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 ini_set('display_errors', 1);
                                 error_reporting(E_ALL); 
                                   require "basedatos.php";
                                   $ob = new basedatos();
                                    $validarID=$ob->get_data("SELECT * FROM productos");
                                    $array=$validarID['DATA'];
                                    $tamanoArray=count($array);
                                    if($tamanoArray>0){
                                    $aux="";
                                    for ($i=0; $i < $tamanoArray ; $i++) { 
                                         $aux.="<tr class='text-center bg-primary'>";
                                         $aux.="<td>".$array[$i]['codigo']."</td>";
                                         $aux.="<td>".$array[$i]['nombre']."</td>";
                                         $aux.="<td>".$array[$i]['cantidad']."</td>";
                                         $aux.="<td>".$array[$i]['precio']."</td>";
                                         $aux.="<td>".$array[$i]['estado']."</td>";
                                         if($_SESSION['rol_log']=="Administrador" || $_SESSION['rol_log']=="Docente"){
                                         $aux.='<td> 
                                         
                                            <form action="vistaActualizarProducto.php" method="POST">
                                             <input type="hidden" name="producto_id_actualizar" value="'.$array[$i]['codigo'].'">
                                             <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i></button>
                                         </form>
                                             </td>'
                                                ;
                                         $aux.='<td>
                                         <form action="productoEliminar.php" method="POST">
                                             <input type="hidden" name="producto_id_del" value="'.$array[$i]['codigo'].' ">
                                             <button type="submit" class="btn btn-warning"><i class="far fa-trash-alt"></i></button>
                                         </form>
                                               </td>
                                         ';} $codigoActualizar=$array[$i]['codigo'];
                                         $aux."</tr>";
                                         ;}
                                    echo $aux;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
           <?php include "footer.php";?>