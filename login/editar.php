<?php include 'header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from persona where codigo = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h1 style="font-size: 25px;">Editar Alumno</h1>
                    </center>
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required
                        value="<?php echo $persona->signo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Cuenta: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $persona->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Forma de titulacion: </label>
                        <input type="text" class="form-control" name="txtForma" autofocus required
                        value="<?php echo $persona->forma; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del trabajo: </label>
                        <input type="text" class="form-control" name="txtTrabajo" autofocus required
                        value="<?php echo $persona->trabajo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asesor: </label>
                        <input type="text" class="form-control" name="txtAsesor" autofocus required
                        value="<?php echo $persona->asesor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mes: </label>
                        <select name="txtMes" class="form-control" value="<?php echo $persona->mes; ?>">
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
                        <select name="txtAño" class="form-control" value="<?php echo $persona->año; ?>">
                            <option>2022</option>
                            <option>2021</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                    <br>
                    <button>
                        <i class="fa-solid fa-arrow-rotate-left"> <a href="index.php">Regresar</a></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
