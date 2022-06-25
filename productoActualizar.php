<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL); 
    
    require "basedatos.php";
    $ob = new basedatos();
    $codigo=$_POST['producto_codigo_act'];
    $nombre=$_POST['producto_nombre_act'];
    $foto=$_POST['producto_foto_act'];
    $cantidad=$_POST['producto_cantidad_act'];
    $precio=$_POST['producto_precio_act'];
    $estado=$_POST['producto_estado_act'];
    $validarID=$ob->get_data("SELECT * FROM productos WHERE codigo='".$codigo."'");
    $array=$validarID['DATA'];

    if(!empty($validarID['DATA'])){
        if($array[0]['codigo']==$codigo){
                $sql="UPDATE `productos` SET `nombre` = '".$nombre."', `foto` = '".$foto."', `cantidad` = '".$cantidad."',
                `precio` = '".$precio."', `estado` = '".$estado."' WHERE `codigo` = '".$codigo."'";
                $dato = $ob->get_exec($sql);
                $errorLogin=$codigo;
                return header("Location: vistaListarProducto.php");

        }else{
            $validarUS=$ob->get_data("SELECT * FROM productos WHERE codigo='".$codigo."'");
             $array2=$validarUS['DATA'];
             if(count($array2)<1){
                $sql="UPDATE `productos` SET `nombre` = '".$nombre."', `foto` = '".$foto."', `cantidad` = '".$cantidad."',
                `precio` = '".$precio."', `estado` = '".$estado."' WHERE `codigo` = '".$codigo."'";
                $dato = $ob->get_exec($sql);
                $errorLogin=$codigo;
                return header("Location: vistaListarProducto.php");
             }else{

                $errorLogin=$codigo;
                return header("Location: vistaActualizarProducto.php");
             }
        }
    }else{
        $errorLogin=$codigo;
        return header("Location: vistaActualizarProducto.php");
    }
  