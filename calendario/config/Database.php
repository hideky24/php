<?php
class dataBase
{
    public $host ='localhost'; // servidor
    public $user = 'root'; // usuario phpmyadmin
    public $pass =''; // contraseña
    public $db ='sesiones'; //base de datos
    public $conexion;
    function connectToDatabase(){
        $this->conexion= mysqli_connect($this->host,$this->user, $this->pass,$this->db);

        if (mysqli_connect_error()){
            echo"Tenemos un error de conexion" .mysqli_connect_error();
}

return $this->conexion;


}

}