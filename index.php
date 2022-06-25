<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL); 
	require "conexion.php";
	
	session_start();
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT idUsuario, nombre, rol, contraseña FROM usuarios WHERE usuario='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['contraseña'];
			
			$pass_c = $password;
			
			if($password_bd == $pass_c){
				
			$_SESSION['id_log'] = $row['idUsuario'];
			$_SESSION['nombre_log'] = $row['nombre'];
            $_SESSION['identificacion_log']=$row['identificacion'];
            $_SESSION['telefono_log']=$row['telefono'];
            $_SESSION['email_log']=$row['email'];
            $_SESSION['usuario_log']=$row['usuario'];
            $_SESSION['constraseña_log']=$row['contraseña'];
            $_SESSION['sexo_log']=$row['sexo'];
            $_SESSION['rol_log']=$row['rol'];
            $_SESSION['token_log']=md5(uniqid(mt_rand(),true));
				
				header("Location: vistaHome.php");
				
			} else {
			echo "La contraseña no coincide";
			}	
			} else {
			echo "NO existe usuario";
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "link.php" ?>
    <title>Login</title>
</head>

<body class="bg-primary">
    <div class="container h-75 mt-5">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 d-block mx-auto modal-content bg-primary text-white mt-5 mb-5">
         
        <p class="text-center"> <i class="fas fa-user-circle fa-5x mt-5"></i></p>
            <p class="text-center"> Inicia sesión con tu cuenta </p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                 <?php if(isset($errorLogin)){
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      usuario o contraseña incorrecta
                    </div>
                  </div>';
                 }?> 
                 <label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp;
                    Usuario</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="UserName" name="usuario" pattern="[a-zA-Z0-9]{1,35}"
                        maxlength="35" >
                </div>
                <div class="form-group">
                    <label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp;
                        Contraseña</label>
                    <input type="password" class="form-control" id="UserPassword" name="password"
                        pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="">
                </div>
                <div class="text-center mb-5">
                    <button type="submit" class="btn-success p-1 m-2 rounded">Iniciar sesion</button>
                    <input type="button" class="btn-info rounded p-1 m-2" value="Registrarse" data-toggle="modal"
                        data-target="#myModal">
                </div>
            </form>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Mymodalregistrar"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" action="usuarioAgregar.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRegistro">Formulario de registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset>
                            <legend><i class="far fa-address-card"></i> &nbsp; Datos de la cuenta</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="identificacion_reg"
                                                class="bmd-label-floating">Identificacion</label>
                                            <input type="text" pattern="[0-9-]{8,10}" class="form-control"
                                                name="usuario_identificacion_reg" id="identificacion_reg" maxlength="10"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <label for="usuario_nombre" class="bmd-label-floating">Nombres</label>
                                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}"
                                                class="form-control" name="usuario_nombre_reg" id="usuario_nombre"
                                                maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="usuario_telefono" class="bmd-label-floating">Teléfono</label>
                                            <input type="text" pattern="[0-9()+]{8,10}" class="form-control"
                                                name="usuario_telefono_reg" id="usuario_telefono" maxlength="10">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-7">
                                        <div class="form-group">
                                            <label for="usuario_email" class="bmd-label-floating">Email</label>
                                            <input type="email" class="form-control" name="usuario_email_reg"
                                                id="usuario_email_reg" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="usuario_sexo" class="bmd-label-floating">Sexo</label>
                                            <select name="usuario_sexo_reg" id="input" class="form-control" required="required">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="usuario_rol" class="bmd-label-floating">Roles</label>
                                            <select name="usuario_rol_reg" id="input" class="form-control" required="required">
                                                <option name="Administrador" value="Administrador">Administrador</option>
                                                <option name="Docente" value="Docente">Docente</option>
                                                <option name="Estudiante" value="Estudiante">Estudiante</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="usuario_usuario" class="bmd-label-floating">Nombre de
                                                usuario</label>
                                            <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control"
                                                name="usuario_usuario_reg" id="usuario_usuario" maxlength="35"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="usuario_clave_reg" class="bmd-label-floating">Contraseña</label>
                                            <input type="password" class="form-control" name="usuario_clave_reg"
                                                id="usuario_clave_reg" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-raised btn-info btn-sm">Crear cuenta</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-raised btn-danger btn-sm"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

