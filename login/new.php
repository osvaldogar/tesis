
 <?php include 'header.php' ?>

<?php
    include_once "conexion.php";
    $sentencia = $bd -> query("select * from persona");
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
    
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<div class="container mt-12" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;"><center>Nuevo Alumno</center></h2>
                
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Cuenta: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Forma de titulacion: </label>
                        <input type="text" class="form-control" name="txtForma" autofocus required>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del trabajo: </label>
                        <input type="text" class="form-control" min=9 max=10 name="txtTrabajo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asesor trabajo: </label>
                        <input type="text" class="form-control" name="txtAsesor" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mes: </label>
                        
                        <select name="txtMes" class="form-control" id="">
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año: </label>
                        
                        <select name="txtAño" class="form-control" id="">
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                    <br>
                        <button>
                        <i class="fa-solid fa-arrow-rotate-left"> <a href="index.php">Regresar</a></i>
                        </button>
                    <br>
                </form>
            </div>
        </div>
    </div> 
</div>
<?php include 'footer.php' ?>

<i class="fa-solid fa-arrow-rotate-left"> <a href="index.php">Regresar</a></i>
    
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="./js/buscador.js"></script>
<script src="https://kit.fontawesome.com/cd12a3c264.js" crossorigin="anonymous"></script>
</html>