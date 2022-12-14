<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: login.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php' ?>

    <?php
    include_once "conexion.php";
    $sentencia = $bd->query("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
    ?>


    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-13">

                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Alumnos</h2>
                        <form class="d-flex">
                        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
                        placeholder="Buscar">
                    <hr>
                    </form>
                    </div>
                    <div class="p-4">
                        <table class="table align-middle table_id">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">No. Cuenta</th>
                                    <th scope="col">Forma de titulacion</th>
                                    <th scope="col">Nombre del trabajo</th>
                                    <th scope="col">Nombre del Asesor</th>
                                    <th scope="col">Mes</th>
                                    <th scope="col">Año</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($persona as $dato) {
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $dato->codigo; ?></td>
                                        <td><?php echo $dato->nombre; ?></td>
                                        <td><?php echo $dato->signo; ?></td>
                                        <td><?php echo $dato->edad; ?></td>
                                        <td><?php echo $dato->forma; ?></td> 
                                        <td><?php echo $dato->trabajo; ?></td>
                                        <td><?php echo $dato->asesor; ?></td> 
                                        <td><?php echo $dato->mes; ?></td> 
                                        <td><?php echo $dato->año; ?></td>  
                                   

                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="./js/buscador.js"></script>

</html>