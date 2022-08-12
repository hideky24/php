<?php
include('../config/config.php');
include('paciente.php');
$p = new paciente();
$dp = mysqli_fetch_object($p->getOne($_GET['id']));  
$date = new DateTime($dp->fecha);

if (isset($_POST) && !empty($_POST)){
     $_POST['imagen'] = $dp->imagen;
    if ($_FILES['imagen']['name'] !== ''){
      $_POST['imagen'] = saveImage($_FILES);
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
                    <input type="text" name="nombres" id="nombres" placeholder="Nombre del paciente" require class="form-control" value="<?= $dp->nombres ?>" />
                    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
                </div>
                <div class="col">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellido del paciente" require class="form-control" value="<?= $dp->apellidos ?>" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input type="email" name="email" id="email" placeholder="Email del paciente" require class="form-control" value="<?= $dp->email ?>" />
                 </div>
                 <div class="col"> 
                 <input type="text" name="celular" id="celular" placeholder="Celular del paciente" require class="form-control" value="<?= $dp->celular ?>" />        
                
                </div>
              </div>
            
              <div class="row mb-2">
              <div class="col">
              <textarea name="enfermedades" id="enfermedades" placeholder="Enfermedades del paciente" requiere class= "form-control"><?= $dp->enfermedades?></textarea>
              
             </div>
          </div>
              <div class="row mb-2">
        <div class="col">
        <input type="text" name="duracionSesion" id="duracionSesion" place holder="Duracion de la sesión" require class="form-control" value="<?= $dp->duracionSesion ?>" />
        </div>
        </div>
    </div>   
    <div class="row mb-2">
        <div class="col">
        <input type="datetime-local" name="fecha" id="fecha" require class="form-control" value="<?= $date->format('Y-m-d') ?>" />
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


 


</body>


</html>