<?php

include 'application/dao/daoImportes.php';
include 'application/dao/daoComercio.php';
include 'application/dao/daoUsuario.php';


class Model_Liquidacion extends Model{

	private $id;
	private $monto;
	private $fecha_desde;
	private $fecha_hasta;

    public function liquidar($fecha){

		$daoImportes = new daoImportes();
		$fecha = '2018-11-26';
       	$daoImportes->liquidar($fecha);

        header('Location: /liquidacion/verLiquidaciones');
	}


    public function verLiquidaciones(){

		$daoImportes = new daoImportes();
       	$arrayDeLiquidaciones = $daoImportes->verLiquidaciones();
        return $arrayDeLiquidaciones;

	}


	public function getListadoImportes(){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getListadoImportes();
        return $data;

	}

	public function getPorcentaje($rol){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getPorcentaje($rol);
        return $data;

	}

	public function verComercios(){

		$daoComercio = new daoComercio();
       	$data = $daoComercio->getAllComercios();
        return $data;

	}

	public function verRepartidores($rol){

		$daoUsuario = new daoUsuario();
       	$data = $daoUsuario->getUsuariosByRol($rol);
        return $data;

	}


	public function liquidarComercio($id_comercio){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->makeLiquidacionComercio($id_comercio);
       	$data['id_comercio'] = $id_comercio;
		$daoImportes->saveLiquidacionComercio($data);

    }


    public function liquidarRepartidor($id_repartidor){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->makeLiquidacionRepartidor($id_repartidor);
       	$data['id_repartidor'] = $id_repartidor;
		$daoImportes->saveLiquidacionRepartidor($data);

    }


    public function getLiquidacionesComercio($id_comercio){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getLiquidacionesComercio($id_comercio);
        return $data;

	}


	public function getLiquidacionesRepartidor($id_repartidor){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getLiquidacionesRepartidor($id_repartidor);
        return $data;

	}


	public function getImportesSinLiquidarComercio($id_comercio){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getImportesSinLiquidarComercio($id_comercio);
        return $data;

	}


	public function getImportesSinLiquidarRepartidor($id_repartidor){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getImportesSinLiquidarRepartidor($id_repartidor);
        return $data;

	}


	public function getDetalleLiquidacion($id_liquidacion){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getDetalleLiquidacion($id_liquidacion);
        return $data;

	}


	public function getSumasLiquidacion($id_liquidacion){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getSumasLiquidacion($id_liquidacion);
        return $data;

	}

	public function getCantidadDeVentas($id_liquidacion){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getCantidadDeVentas($id_liquidacion);
        return $data;

	}

	public function getLiquidacion($id_liquidacion){

		$daoImportes = new daoImportes();
       	$data = $daoImportes->getLiquidacion($id_liquidacion);
        return $data;

	}
	
}