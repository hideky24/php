<?php
    include_once('../config/config.php');
    include('paciente.php');
$p = new paciente();
$data = $p->getALL();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $remove = $p->remove($_GET['id']);
     if ($remove) {
  header('location: '.ROOT.'paciente/index.php');
  }else{
    $mensaje = '<div class="alert alert-danger" role="alert" > Error al eliminar</div>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de sesiones</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php include ('../menu.php')?>
<div class="container" >
        <h2 class="text-center mb-2" >Calendario </h2>
        <div class="row" >
            
        <?php
            while ($patient = mysqli_fetch_object($data)){
                $input = $patient->fecha;
                echo "<div class='col-6'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>
                    <img src='".ROOT."/images/$patient->imagen' width='50' height='50' />
                    $patient->nombres $patient->apellidos
                    </h5>"; 
                    echo " <p> <b>Fecha:</b> ".date("D", strtotime($input)) . " " . date("d-M-Y", strtotime($input)). " </p> ";
                echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/paciente/edit.php?id=$patient->id' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/paciente/index.php?id=$patient->id' >Eliminar</a> </div>";

                echo "</div>";
                echo "</div>";  
            }
            ?>
</body>
</html>