
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title> Lista de pacientes </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php include ('../menu.php') ?>
    <div class="contaioner">
        <h2 class="text-center mb-5"> Lista pacientes</h2>

        <div class="row">
            <?php
            while ($patient = mysqli_fectch_object($allpatient)) {
                $input = $patient->sessionDate;
                echo "<div class='col'>" ; 
                echo "<div class= 'boder border-info p-2'>"; 
                
                echo " <p> <b>Fecha:</b> ".date("D", strtotime($input)) . " " . date("d-M-Y H:i", strtotime($input)). " </p> ";
                echo " <div class='text-center' ><a class='btn btn-success ' href='" . ROOT . "/Ptients/edit.php?id=$patient->id' > Modificar </a> - <a class='btn btn-danger ' href=";
                echo " </div> ";
                echo "</div>";
            }
            ?>
        </div>


    </div>
</body>

</html>