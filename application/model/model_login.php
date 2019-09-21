<?php

include 'application/dao/daoUsuario.php';


class Model_Login extends Model{

    public function getAcceso($email, $clave){

		$daoUsuario = new daoUsuario();
		
       	$data= $daoUsuario->getAcceso($email, $clave);

       	return $data;

	}

    public function logout(){

		session_destroy();

	}
	
}