<?php   

    include "conexion.php";
    include "funciones.php";

    $querry = "";
    $salida = array();
    $querry= "SELECT * FROM usuario ";

    if(isset($_POST["search"]["value"])){
        $querry .= 'WHERE nombre LIKE "% '.$_POST["search"]["value"].'%" ';
        $querry .= 'OR apellidos LIKE "% '.$_POST["search"]["value"].'%" ';
    }
    
    if(isset($_POST["search"]["order"])){
        $querry .= 'ORDER BY' . $_POST['order']['0']['column']. ' '.$_POST['order']['0'] ['dir']. ' ';
    
       
    } else{
        $querry.='ORDER BY id DESC ';
    }

    if($_POST["length"]!= -1 ){
        $querry .='LIMIT '.$_POST["start"]. ';' .$_POST["length"];

    }


    $stmt = $conexion->prepare($querry);
    $stmt->execute();
    $resultado =$stmt->fetchAll();
    $datos= array();
    $filtered_rows =$stmt->rowCount();
    foreach($resultado as $fila){
        $imagen = '';
        if($fila["imagen"] != '' ){
            $imagen = '<img src="img/'. $fila["imagen"]. '"
            class="img-thumbnail" width="50" heigth="35"/>';
        }else{
            $imagen='';
        }
        $sub_array = array();
        $sub_array[]= $fila["id"];
        $sub_array[]= $fila["nombre"];
        $sub_array[]= $fila["apellidos"];
        $sub_array[]= $fila["telefono"];
        $sub_array[]= $fila["email"];
        $sub_array[]= $imagen;
        $sub_array[]= $fila["fecha_creacion"];
        $sub_array[]= '<button type="button" name="editar" id="'.$fila["id"].'" class="btn btn-warning btn-xs editar">editar</button>';
        $sub_array[]= '<button type="button" name="borrar" id="'.$fila["id"].'" class="btn btn-danger btn-xs borrar">borrar</button>';
        $datos[] = $sub_array;
    }

    $salida= array(
        "draw"                => intval($_POST["draw"]),
        "recordsTotal"        => $filtered_rows,
        "recordsFiltered"     => obtener_todos_registros(),
        "data"                => $datos

    );

    echo json_encode($salida);