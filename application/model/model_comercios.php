<?php

include_once 'application/dao/daoComercio.php';


class Model_Comercios extends Model{

	private $id;
	private $razonSocial;
	private $direccion;
	private $categoria;
	private $zonaCobertura;


   public function getComercioById($comercio_id){

		$daoComercio = new daoComercio();
		$comercio= $daoComercio->getComercioById($comercio_id);

        return $comercio;

	}

    public function getAllComercios(){

		$daoComercio = new daoComercio();
		$arrayComercios= $daoComercio->getAllComercios();
       
        return $arrayComercios;

	}

	public function saveComercio($comercio, $logo, $banner){

		$daoComercio = new daoComercio();
		$id= $daoComercio->saveComercio($comercio, $logo, $banner);

		return $id;

	}

	public function deleteComercio($comercio_id){

		$daoComercio = new daoComercio();
		$daoComercio->deleteComercio($comercio_id);

	}

	public function update_comercio($comercio, $logo, $banner){

		$daoComercio = new daoComercio();
		$daoComercio->update_comercio($comercio, $logo, $banner);

	}

	public function habilitar_comercio($id){

		$daoComercio = new daoComercio();
		$data = $daoComercio->habilitar_comercio($id);

		return $data;

	}


	public function deshabilitar_comercio($id){

		$daoComercio = new daoComercio();
		$data = $daoComercio->deshabilitar_comercio($id);

		return $data;

	}

 
}

?>