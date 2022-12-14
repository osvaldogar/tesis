<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: login.php');
    }
}


?>
<?php include 'header.php' ?>

<?php
include_once "conexion.php";
$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
    body{
        background-image: url("style/tesis.jpg");
        

    }
</style>

<body>


    <div class="container mt-12">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- inicio alerta -->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Rellena todos los campos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>


                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registrado!</strong> Se agregaron los datos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>



                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Vuelve a intentar.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>



                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cambiado!</strong> Los datos fueron actualizados.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>


                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Eliminado!</strong> Los datos fueron borrados.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>

                <!-- fin alerta -->
                <br>
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Alumnos</h2>
                        <form class="d-flex">
                            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
                            <hr>
                        </form>
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-person-plus-fill"></i> <a href="new.php" style="text-decoration:none; color: white;">Nuevo alumno</a>
                        </button>
                    </div>
                    <div class="p-4">
                        <table class="table align-middle table_id" id="">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">No. Cuenta</th>
                                    <th scope="col">Forma de titulacion</th>
                                    <th scope="col">Nombre del trabajo</th>
                                    <th scope="col">Asesor</th>
                                    <th scope="col">Mes</th>
                                    <th scope="col">Año</th>
                                    <th scope="col" colspan="2">Opciones</th>
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

                                        <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>">
                                                <i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

                        <script>

                            $(document).ready(function() {
                                var table = $('#example').DataTable({
                                    orderCellsTop: true,
                                    fixedHeader: true
                                });

                                //Creamos una fila en el head de la tabla y lo clonamos para cada columna
                                $('#example thead tr').clone(true).appendTo('#example thead');

                                $('#example thead tr:eq(1) th').each(function(i) {
                                    var title = $(this).text(); //es el nombre de la columna
                                    $(this).html('<input type="text" placeholder="Search...' + title + '" />');

                                    $('input', this).on('keyup change', function() {
                                        if (table.column(i).search() !== this.value) {
                                            table
                                                .column(i)
                                                .search(this.value)
                                                .draw();
                                        }
                                    });
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>


        </div>
    </div>





</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="./js/buscador.js"></script>

</html>