
<?php include "vistaGeneral.php";
      if($_SESSION['rol_log']=="Estudiante"){
        session_unset();
         session_destroy();  
     header("Location: index.php");
     }
?>
<div class="container-fluid">
 
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">

                    <th>IDENTIFICACION</th>
                    <th class="col-2">NOMBRES</th>
                    <th>TELÉFONO</th>
                    <th>EMAIL</th>
                    <th>SEXO</th>
                    <th>ROL</th>
                    <?php if($_SESSION["rol_log"]=="Administrador"){?>
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
                                    $validarID=$ob->get_data("SELECT * FROM usuarios");
                                    $array=$validarID['DATA'];
                                    $tamanoArray=count($array);
                                    if($tamanoArray>0){
                                    $aux="";
                                    for ($i=0; $i < $tamanoArray ; $i++) { 
                                         $aux.="<tr class='text-center bg-primary'>";
                                         $aux.="<td>".$array[$i]['identificacion']."</td>";
                                         $aux.="<td>".$array[$i]['nombre']."</td>";
                                         $aux.="<td>".$array[$i]['telefono']."</td>";
                                         $aux.="<td>".$array[$i]['email']."</td>";
                                         $aux.="<td>".$array[$i]['sexo']."</td>";
                                         $aux.="<td>".$array[$i]['rol']."</td>";
                                        
                                            if($_SESSION['rol_log']=="Administrador"){
                                             $aux.='<td> 
                                             <form action="vistaActualizarUsuario.php" method="POST">
                                                 <input type="hidden" name="usuario_id_actualizar" value="'.$array[$i]['identificacion'].'">
                                                 <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i></button>
                                             </form>
                                               </td>';
                                             $aux.='<td>
                                             <form action="usuarioEliminar.php" method="POST">
                                                 <input type="hidden" name="usuario_id_del" value="'.$array[$i]['identificacion'].'">
                                                 <button type="submit" class="btn btn-warning"><i class="far fa-trash-alt"></i></button>
                                             </form>
                                                   </td>
                                             </tr>';
                                            }
                                        }
                                    echo $aux;
                                    }
                                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php include "footer.php";?>