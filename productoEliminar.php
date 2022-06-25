<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    $codigo=$_POST['producto_id_del'];

    $validarID=$ob->get_data("SELECT codigo FROM productos WHERE codigo='".$codigo."'");
    $array=count($validarID['DATA']);

    if($array>0){
      $dato = $ob->get_exec("DELETE FROM productos  WHERE codigo='".$codigo."'");
      $errorEliminar="Eliminado exitosamente";
      return header("Location: vistaListarProducto.php");
    }else{
      echo "entro al else";
      $errorEliminar="No se pudo eliminar el usuario";
      include_once "vistaListarProducto.php";
    }
  