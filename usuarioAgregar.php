<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    $identificacion=$_POST['usuario_identificacion_reg2'];
    $nombre=$_POST['usuario_nombre_reg2'];
    $telefono=$_POST['usuario_telefono_reg2'];
    $usuario=$_POST['usuario_usuario_reg2'];
    $email=$_POST['usuario_email_reg2'];
    $password=$_POST['usuario_clave_reg2'];
    $rol=$_POST['usuario_rol_reg2'];
    $sexo=$_POST['usuario_sexo_reg2'];

    $validarID=$ob->get_data("SELECT identificacion FROM usuarios WHERE identificacion='".$identificacion."' OR 
    usuario='".$usuario."'");
//1065379389 karen llorente 3205789630 karen12 karen21@gmail.com 123456789 Administrador Masculino 
    if(empty($validarID['DATA'])){
      $sql="INSERT INTO usuarios (nombre, identificacion, telefono, email, rol, usuario, contraseña, sexo)
      VALUES ('$nombre','$identificacion', '$telefono','$email', '$rol' ,'$usuario', '$password', '$sexo')";
      $dato = $ob->get_exec($sql);
      return header("Location: vistaNuevoUsuario.php");
    }else{
      include_once "vistaNuevoUsuario.php";
    }
  