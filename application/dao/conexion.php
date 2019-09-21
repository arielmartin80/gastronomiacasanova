<?php

//PROD/*

define('HOST','localhost'); 
define('USER','id10928939_admin');
define('PASS','mleira80');
define('DBNAME','id10928939_databasegc');

//DEV
/*

define('HOST','localhost'); 
define('USER','root');
define('PASS','');
define('DBNAME','databasegc');*/

class Conexion
{

    protected $conexion;

    public function conectar()
    {
        $this->conexion = mysqli_connect(HOST, USER, PASS, DBNAME);
        if (!$this->conexion ) DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
		
		mysqli_set_charset($this->conexion,"utf8");

        return $this->conexion;

    }

    public function desconectar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }

    }


}