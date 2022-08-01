<?php
  include('../config/config.php');
  include('../config/Database.php');

  class Patient{
    public $conexion; 

    function __construct(){
        $ubala= new Database(); 
        $this->conexion = $ubala->connectToDatabase();
    }

    function save($params){
        $nombre = $params['Nombre'];
        $celular = $params['Celular'];
        $email = $params['E-mail'];
        $direccion = $params['Direccion'];
        $mensaje = $params['mensaje'];
        

        $insert = " INSERT INTO clientes VALUES (NULL, '$nombre', '$celular', '$email', '$direccion', '$mensaje') ";
        return mysqli_query($this->conexion, $insert);
    }
    function getALL(){
        $sql = "SELECT = FROM clientes ORDER BY fecha ASC ";
        return mysqli_query($this->conexion, $sql);

    }
    function getOne($id){
      $sql= "SELECT * FROM patients WHERE id=$id";
    }

    function remove($id){
      $remove = "DELETE FROM patients WHERE id = $id"; 
      return mysqli_query ($this->conexion, $remove);
    }
  }
 

?>