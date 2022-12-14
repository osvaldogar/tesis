<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtSigno"]) ||empty($_POST["txtEdad"])  ||empty($_POST["txtForma"])  ||empty($_POST["txtTrabajo"]) ||empty($_POST["txtAsesor"]) ||empty($_POST["txtMes"]) ||empty($_POST["txtAño"])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'conexion.php';
    $nombre = $_POST["txtNombre"];
    $signo = $_POST["txtSigno"];
    $edad = $_POST["txtEdad"];
    $forma = $_POST["txtForma"];
    $trabajo = $_POST["txtTrabajo"];
    $asesor = $_POST["txtAsesor"];
    $mes = $_POST["txtMes"];
    $año = $_POST["txtAño"];
    
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,signo,edad,forma,trabajo,asesor,mes,año) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$signo,$edad,$forma,$trabajo,$asesor,$mes,$año]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>