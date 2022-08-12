<?php 

function getFolderProject() {
   
    if (strpos(__DIR__, '/') !== false) {
        $folder = str_replace('/opt/lampp/htdocs/', '/', __DIR__);
    } else{
        $folder = str_replace ('C:\\xampp\\htdocs\\', '/', __DIR__);
        }
        $folder= str_replace('config', '', $folder);
    return $folder;
}

function saveImage($files){
    /* LE QUITAMOS LOS ESPACIOS Y ACORTAMOS EL NOMBRE A LA IMG */
    $file_name = str_replace(' ', '', $files['imagen']['name']);
      $file_tmp = $files['imagen']['tmp_name'];
     /* GUARDAMOS LA IMG TEMPORALMENTE */
    
    move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . getFolderProject() . '/images/' . $file_name); /* INDICAMOS LA RUTA DONDE SE VA ALMACENAR ESA IMAGEN */
    
    return $file_name; /* ACTIVA LA FUNCION */
    }
?>