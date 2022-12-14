<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $signo = $_POST['txtSigno'];
    $edad = $_POST['txtEdad'];
    $forma = $_POST['txtForma'];
    $trabajo = $_POST['txtTrabajo'];
    $asesor = $_POST["txtAsesor"];
    $mes = $_POST["txtMes"];
    $año = $_POST["txtAño"];
    
    

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, signo = ?, edad = ?, forma = ?, trabajo = ?, asesor =?,  mes=?, año=? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre,$signo,$edad,$forma,$trabajo,$asesor,$mes,$año, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>