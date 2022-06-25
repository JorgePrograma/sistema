<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    $identificacion=$_POST['usuario_identificacion_act'];
    $nombre=$_POST['usuario_nombre_act'];
    $telefono=$_POST['usuario_telefono_act'];
    $usuario=$_POST['usuario_usuario_act'];
    $email=$_POST['usuario_email_act'];
    $password=$_POST['usuario_clave_act'];
    $rol=$_POST['usuario_rol_act'];
    $sexo=$_POST['usuario_sexo_act'];
    $validarID=$ob->get_data("SELECT * FROM usuarios WHERE identificacion='".$identificacion."'");
    $array=$validarID['DATA'];

    if(!empty($validarID['DATA'])){
        if($array[0]['usuario']==$usuario){
                $sql="UPDATE `usuarios` SET `nombre` = '".$nombre."', `telefono` = '".$telefono."', `usuario` = '".$usuario."',
                `email` = '".$email."', `contraseña` = '".$password."', `rol` = '".$rol."', `sexo` = '".$sexo."'  WHERE `identificacion` = '".$identificacion."'";
                $dato = $ob->get_exec($sql);
                return header("Location: vistaListarUsuario.php");
        }else{
            $validarUS=$ob->get_data("SELECT * FROM usuarios WHERE usuario='".$usuario."'");
             $array2=$validarUS['DATA'];
             if(count($array2)<1){
            $sql="UPDATE `usuarios` SET `nombre` = '".$nombre."', `telefono` = '".$telefono."', `usuario` = '".$usuario."',
            `email` = '".$email."', `contraseña` = '".$password."', `rol` = '".$rol."', `sexo` = '".$sexo."'  WHERE `identificacion` = '".$identificacion."'";
            $dato = $ob->get_exec($sql);
            return header("Location: vistaListarUsuario.php");
             }else{
                echo "no se puede";
                return header("Location: vistaActualizarUsuario.php");
             }
        }
    }else{
        $errorActualizar=1;
        return header("Location: vistaActualizarUsuario.php");
    }
  