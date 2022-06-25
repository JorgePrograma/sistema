<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    
    $codigo=$_POST['producto_codigo_reg'];
    $nombre=$_POST['producto_nombre_reg'];
    $foto=$_POST['producto_foto_reg'];
    $cantidad=$_POST['producto_cantidad_reg'];
    $precio=$_POST['producto_precio_reg'];
    $estado=$_POST['producto_estado_reg'];
echo $codigo.
$nombre.
$foto.
$cantidad.
$precio.
$estado;
    $validarID=$ob->get_data("SELECT codigo FROM productos WHERE codigo='".$codigo."'");
//1065379389 karen llorente 3205789630 karen12 karen21@gmail.com 123456789 Administrador Masculino 
    if(empty($validarID['DATA'])){
      $sql="INSERT INTO productos (codigo, nombre, foto, cantidad, precio, estado)
      VALUES ('$codigo', '$nombre', '$foto' ,'$cantidad','$precio', '$estado')";
      $dato = $ob->get_exec($sql);
      return header("Location: vistaNuevoProducto.php");
    }else{
      include_once "vistaNuevoProducto.php";
    }
  