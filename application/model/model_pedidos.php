<?php

include_once 'application/dao/daoItem.php';
include_once 'application/dao/daoPedidos.php';
include_once 'application/dao/daoComercio.php';
include_once 'application/dao/daoUsuario.php';
include_once 'application/dao/daoImportes.php';


class Model_Pedidos extends Model{

	private $id;
	private $estado;
	private $fecha;
	private $id_comercio;
	private $hora_inicio;
	private $id_cliente;
	private $hora_a_entregar;
	private $hora_finalizacion;


   public function getItemById($item_id){

		$daoItem = new daoItem();
		$item= $daoItem->getItemById($item_id);
        return $item;

	}

    public function getAllItems(){

		$daoItem = new daoItem();
		$arrayItems= $daoItem->getAllItems();
        return $arrayItems;

	}

	public function getItemsByComercioId($comercio_id){

		$daoItem = new daoItem();
		$arrayItems= $daoItem->getItemsByComercioId($comercio_id);
        return $arrayItems;

	}

	public function savePedido($data, $monto){

		$daoPedidos = new daoPedidos();
		$daoPedidos->savePedido($data, $monto);

	}

	public function getPedidosByEstado($estado){

		$daoPedidos = new daoPedidos();
		$listadoDePedidos = $daoPedidos->getPedidosByEstado($estado);
		return $listadoDePedidos;

	}

	public function pedidoListo($id_pedido){

		$daoPedidos = new daoPedidos();
		$daoPedidos->pedidoListo($id_pedido);

	}
	
	public function pedidoListoCliente($id_pedido, $id_cliente){

		$daoPedidos = new daoPedidos();
		$daoPedidos->pedidoListoCliente($id_pedido, $id_cliente);

	}

	public function asignarPedido($id_pedido, $id_repartidor){

		$daoPedidos = new daoPedidos();
		$daoPedidos->asignarPedido($id_pedido, $id_repartidor);

	}

	public function despacharPedido($id_pedido, $tiempo_estimado){

		$daoPedidos = new daoPedidos();
		$daoPedidos->despacharPedido($id_pedido, $tiempo_estimado);

	}

	public function entregarPedido($id_pedido){

		$daoPedidos = new daoPedidos();
		$horas = $daoPedidos->entregarPedido($id_pedido);
		return $horas;

	}

	public function cancelarPedidoAsignado($id_pedido){

		$daoPedidos = new daoPedidos();
		$daoPedidos->cancelarPedidoAsignado($id_pedido);

	}

	public function getPedidoById($id_pedido){

		$daoPedidos = new daoPedidos();
		$pedido = $daoPedidos->getPedidoById($id_pedido);
		return $pedido;

	}

	public function getItemsPedidoById($id_pedido){

		$daoPedidos = new daoPedidos();
		$listadoDeItems = $daoPedidos->getItemsPedidoById($id_pedido);
		return $listadoDeItems;

	}

	public function getPedidosByComercio($id_comercio){

		$daoPedidos = new daoPedidos();
		$listadoDePedidos = $daoPedidos->getPedidosByComercio($id_comercio);
		return $listadoDePedidos;

	}
	public function getPedidosByCliente($id_cliente){

		$daoPedidos = new daoPedidos();
		$listadoDePedidos = $daoPedidos->getPedidosByCliente($id_cliente);
		return $listadoDePedidos;

	}

	public function getPedidosComercioByEstado($id_comercio, $estado){

		$daoPedidos = new daoPedidos();
		$listadoDePedidos = $daoPedidos->getPedidosComercioByEstado($id_comercio, $estado);
		return $listadoDePedidos;

	}

	public function getComercioById($id_comercio){

		$daoComercio = new daoComercio();
		$comercio = $daoComercio->getComercioById($id_comercio);
		return $comercio;

	}

	public function getUsuarioById($id){

		$daoUsuario = new daoUsuario();
		$usuario = $daoUsuario->getUsuarioById($id);
		return $usuario;

	}

	public function guardarImportes($id_pedido){

		$daoImportes = new daoImportes();
		$daoPedidos = new daoPedidos();

        // Obtiene Monto total del pedido
        $dataPedido = $daoPedidos->getPedidoById($id_pedido);
        $montoTotal = $dataPedido['monto'];

        $monto_comercio = $montoTotal * 0.92; // Se le cobra el 8%
        $monto_repartidor = $montoTotal * 0.03; // Se queda con el 3%
        $monto_sistema = $montoTotal * 0.05; // Se queda con el 5%

        // Finaliza la entrega para obtener horarios
        $data = $daoPedidos->entregarPedido($id_pedido);
        $horaTolerable=$data['horaTolerancia']; // Es la hora estimada mas un 15% de demora
        $horaFin=$data['horaFin'];
        // Hardcodear este valor para probar la penalización
        //$horaFin = "2018-11-23 19:27:30" 

        if (new DateTime($horaFin) > new DateTime($horaTolerable)) {
            $penalizado = True;
            $monto_repartidor =  $montoTotal * 0.025; // Se le quita el 0.5%
            $monto_comercio = $montoTotal * 0.975; // Se queda con el 0.5% restado al delivery
        }else{
            $penalizado = False;
        }

        $fecha_pedido = $daoPedidos->getFechaPedido($id_pedido);
        $id_comercio = $dataPedido['id_comercio'];
        $id_repartidor = $dataPedido['id_repartidor'];

        // Inserta los montos correspondientes a cada actor en la tabla importes para luego poder realizar la liquidación.
		$daoImportes->guardarImportes($id_pedido, $id_comercio, $id_repartidor, $monto_comercio, $monto_repartidor, $monto_sistema, $fecha_pedido);

		return $penalizado;

	}


	 public function ver_items(){

		$daoComercio = new daoComercio();
		$comercio = $daoComercio->getComercioById($id_comercio);
		return $comercio;
	 }


}

?>