<?php
  include_once('../config/config.php');
  include('../config/Database.php');

  class paciente{
    public $conexion; 

    function __construct()
    {
        $db= new Database(); 
        $this->conexion = $db->connectToDataBase();
    }

    function save($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $enfermedades = $params['enfermedades'];
        $duracionSesion = $params['duracionSesion'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];
        

        $insert = "INSERT INTO pacientes VALUES (NULL, '$nombres', '$apellidos', '$email', '$celular',
         '$enfermedades','$duracionSesion', '$fecha', '$imagen') ";
        return mysqli_query($this->conexion, $insert);
    }
    function getALL(){
      $sql = "SELECT = FROM pacientes";
      return mysqli_query($this->conexion, $sql);
  }}
    
    

    //function remove($id){
      //$remove = "DELETE FROM pacientes WHERE id = $id"; 
      //return mysqli_query ($this->conexion, $remove);
    //}
   

?>