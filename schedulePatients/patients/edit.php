<?php
include('../config/config.php');
include('patient.php');
$p = new Patient();
$data = mysqli_fetch_object($p->getOne($__GET['id']));  
$date = new Datetime($data->$sessionDate);

if (isset($_POST) && !empty($_POST)){
    $_POST['image'] = $data->image;
    if ($_FILES['image']['name']!--''){
        $_POST['image'] = saveImage($_FILES);
    }
    $update = $p->update($_POST);
    if ($update){
        $error = '<div class="alert alert-success" role="alert">Paciente modificado correctamente</div>';
    }else{
        $error = '<div class="alert alert-danger" role="alert" > Error al modificar el paciente </div>';
    }
}

?>
<!DOCTYPE html> 
<html>

<head>
    <meta charset="UTF-8" />
    <title> Modificar Paciente </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php include('../menu.php') ?>
    <div class="container">
        <?php 
        if  (isset($error)){
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5"> Modificar paciente </h2>
        <form method="POST" enctype="multipar/form-data">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre paciente" require class="form-control" value="<?= $data->nombre ?>" />
                    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
                </div>
                <div class="col">
                    <input type="text" name="edad" id="edad" placeholder="Apellido paciente" require class="form-control" value="<?= $data->edad ?>" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input type="email" name="email" id="email" placeholder="Email paciente" require class="form-control" value="<?= $data->email ?>" />
                 </div>
                 <div class="col"> 
                 <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad paciente" require class="form-control" value="<?= $data->ciudad ?>" />        
                
                </div>
              </div>
            
              <div class="row mb-2">
              <div class="col">
              <textarea name="ciudad" id="ciudad" placeholder="Departamento y ciudad de residencia" requiere class= "form-control"></textarea>
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
    <button class="btn btn-success"> Registrar </button>

        </form>

    </div>
</body>


</html>