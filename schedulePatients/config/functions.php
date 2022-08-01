<?php 
//function getFolderproject();
{
var_dump(__DIR__);
    if (strpos(__DIR__, '/') !== false) {
        $root = str_replace('/opt/lampp/htdocs/', '/', __DIR__);
    } else{
    $root = str_replace ('C:\\xampp\\htdocs\\', '/', __DIR__);
    }
    $folder= str_replace('config', '', '$folder');
    return $folder;

}
?>