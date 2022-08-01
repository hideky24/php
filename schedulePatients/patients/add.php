<?php
 include('../config/config.php');
 include('patient.php');

 if (isset($_POST) && !empty($_POST)){
    $patient = new Patient();

   
    $save = $patient->save($_POST);
    if ($save){
        $error = '<div class="alert alert-success" role="alert">Paciente creado correctamente</div>';
    } else{
        $error = '<div class="alert alert-danger" role="alert" > Error al crear un paciente </div>';
    }
 }

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
        <title> Crear paciente </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php include('menu.php') ?>
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
<input type="text" name="Nombre" id="Nombre" placeholder="Nombre del cliente" require class="form-control" />
                </div>
             
            </div>

        <div class="row mb-2">
        <div class="col">
    <input type="email" name="E-mail" id="E-mail" placeholder="Email del cliente" require class="form-control" />
    </div>
    <div class="col">
    <input type="number" name="Celular" id="Celular" placeholder="Numero celular del cliente" require class="form-control" />
    </div>
    </div> 
    <div class="row mb-2">
        <div class="col">
<textarea name="Direccion" id="Direccion" placeholder="Departamento y ciudad de residencia" requiere class= "form-control"></textarea>
<b> Aclarar si tiene nacionalidad extranjera </b>
        </div>
    </div>   
    <div class="row mb-2">
        <div class="col">
        <input type="datetime-local" name="sessionDate" id="sessionDate" require class="form-control" />
        </div>
        <div class="col">
            <input type="text" name="duration" id="duration" place holder="Duracion de la sesión" require class="form-control" />
        </div>
    </div>   

    <div class="row mb-2">
        <div class="col">
        <input type="file" name="image" id="image" class="form-control" />
        </div>
        </div>
        <button class="btn btn-success"> Registrar </button>
    </form>
    </div>




    </div>
</body>