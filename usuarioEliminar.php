<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    $identificacion=$_POST['usuario_id_del'];

    $validarID=$ob->get_data("SELECT identificacion FROM usuarios WHERE identificacion='".$identificacion."'");
    $array=count($validarID['DATA']);

    if($array>0){
      $dato = $ob->get_exec("DELETE FROM usuarios  WHERE identificacion='".$identificacion."'");
      $errorEliminar="Eliminado exitosamente";
      return header("Location: vistaListarUsuario.php");
    }else{
      echo "entro al else";
      $errorEliminar="No se pudo eliminar el usuario";
      include_once "vistaListarUsuario.php";
    }
  