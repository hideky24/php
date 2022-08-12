<?php
include_once('../config/config.php');
include('paciente.php');
if (isset($_POST) && !empty($_POST)){
    $p = new paciente();
    if ($_FILES['imagen']['name']!==''){
        $_POST['imagen']=saveImage($_FILES);

    }
    $save=$p->save($_POST);
    if ($save){
    $mensaje= '<div class="alert alert-danger"> Sesión registrada</div>';
    }else{ 
    $mensaje= '<div class="alert alert-danger"> Error al registrar!</div>';
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<?php include ('../menu.php')?>
<div class="container">
        <?php
        if(isset($error)){
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5"> Creación de agenda </h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
<input type="text" name="nombres" id="nombres" placeholder="Nombre del paciente" require class="form-control" />
                </div>
                <div class="col">
<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" require class="form-control" />
                </div>
            </div>

        <div class="row mb-2">
        <div class="col">
    <input type="email" name="email" id="email" placeholder="Email del cliente" require class="form-control" />
    </div>
    <div class="col">
    <input type="number" name="Celular" id="Celular" placeholder="Numero celular del cliente" require class="form-control" />
    </div>
    </div> 
    <div class="row mb-2">
        <div class="col">
<textarea name="enfermedades" id="enfermedades" placeholder="Digite las enfermedades" requiere class= "form-control"></textarea>
<div class="col">
            <input type="text" name="duracionSesion" id="duracionSesion" place holder="Duracion de la sesión" require class="form-control" />
        </div>
        </div>
    </div>   
    <div class="row mb-2">
        <div class="col">
        <input type="datetime-local" name="fecha" id="fecha" require class="form-control" />
        </div>
        
    </div>   

    <div class="row mb-2">
        <div class="col">
        <input type="file" name="imagen" id="imagen" class="form-control" />
        </div>
        </div>
        <button class="btn btn-success"> Registrar </button>
    </form>
    </div>




    </div>
    
</body>
</html>