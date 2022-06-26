<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    $identificacion=$_POST['usuario_identificacion_reg'];
    $nombre=$_POST['usuario_nombre_reg'];
    $telefono=$_POST['usuario_telefono_reg'];
    $usuario=$_POST['usuario_usuario_reg'];
    $email=$_POST['usuario_email_reg'];
    $password=$_POST['usuario_clave_reg'];
    $rol=$_POST['usuario_rol_reg'];
    $sexo=$_POST['usuario_sexo_reg'];

    $validarID=$ob->get_data("SELECT identificacion FROM usuarios WHERE identificacion='".$identificacion."' OR 
    usuario='".$usuario."'");    if(empty($validarID['DATA'])){
      
      $sql="INSERT INTO usuarios (nombre, identificacion, telefono, email, rol, usuario, contraseña, sexo)
      VALUES ('$nombre','$identificacion', '$telefono','$email', '$rol' ,'$usuario', '$password', '$sexo')";
      $dato = $ob->get_exec($sql);
      return header("Location: vistaNuevoUsuario.php");
    }else{
      include_once "vistaNuevoUsuario.php";
    }
  