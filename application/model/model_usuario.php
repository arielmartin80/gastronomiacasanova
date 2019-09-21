<?php

include 'application/dao/daoUsuario.php';


class Model_Usuario extends Model{

    public function getUsuarioById($id){

		$daoUsuario = new daoUsuario();
		
       	$data= $daoUsuario->getUsuarioById($id);

       	return $data;

	}


	public function saveUsuario($usuario, $FILES){

		$daoUsuario = new daoUsuario();
		$id = $daoUsuario->saveUsuario($usuario, $FILES);

		return $id;

	}
	public function update_user($usuario){

		$daoUsuario = new daoUsuario();
		$id = $daoUsuario->update_user($usuario);

		return $id;

	}

	public function getAllUsuarios(){

		$daoUsuario = new daoUsuario();
		$data = $daoUsuario->getAllUsuarios();

		return $data;

	}


	public function habilitar_usuario($id){

		$daoUsuario = new daoUsuario();
		$data = $daoUsuario->habilitar_usuario($id);

		return $data;

	}


	public function deshabilitar_usuario($id){

		$daoUsuario = new daoUsuario();
		$data = $daoUsuario->deshabilitar_usuario($id);

		return $data;

	}


	public function asignar_comercio($id_usuario, $id_comercio){

		$daoUsuario = new daoUsuario();
		$daoUsuario->asignar_comercio($id_usuario, $id_comercio);

	}

	
}