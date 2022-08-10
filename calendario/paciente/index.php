<?php
    include_once('../config/config.php');
    include('paciente.php');
$p = new paciente();
$data = $p->getALL();
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
<div class="container" >
        <h2 class="text-center mb-2" >Calendario </h2>
        <div class="row" >
            
    <?php_
while ($pt = mysqli_fetch_object($data)) {
 $date =$pt-> fecha;
 echo "<div class='col' >";
 echo "<div class='border border-infor p-2 > ";
 echo "<h5><img src='".ROOT."/images/$pt->imagen' width='50' height='50'/>$pt->nombres 
 $pt->apellidos </h5>";
 echo " <p> <b>Fecha:</b> ".date('D', strtotime($date) )." ".date('M-Y H:i',strtotime($date)). " 
 </p>";
 echo  " <div class='text-center'> ";
 echo "<a class='btn btn-success' href='edit.php' >Modificar </a> - <a class='btn btn-danger ' href='#'>Eliminar </a>"; 
 echo  "</div>";
 echo "</div>";
 echo "</div>";
 
}
?>
</body>
</html>