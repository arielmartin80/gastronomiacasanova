<?php

@$id_comercio=$_POST['id_comercio'];
@$estado=$_POST['estado'];
@$pendiente=$_POST['pendiente'];
@$asignado=$_POST['asignado'];
@$id_repartidor=$_POST['id_repartidor'];
@$despachado=$_POST['despachado'];
@$tiempo_estimado=$_POST['tiempo_estimado'];
@$entregado=$_POST['entregado'];

include 'daoPedidos.php';
$daoP = new daoPedidos();
include_once 'daoItem.php';
$daoI = new daoItem();
include 'daoUsuario.php';
$daoU = new daoUsuario();
include 'daoImportes.php';
$daoIm = new daoImportes();

//$importes = $daoIm->getFechaPedido(1);
$importes = $daoIm->getListadoImportes();

echo"<pre>";
print_r($importes);
echo"</pre>";

?>



<form action="#" method="POST">
	id_comercio: <input type="text" name="id_comercio" placeholder=" id del comercio">
<!--	estado: <select name="estado">  Elaborandose - Pendiente - Asignado - Despachado - Entregado - Cancelado<br>
		<option value="Elaborandose">Elaborandose</option>
		<option value="Pendiente">Pendiente</option>
		<option value="Despachado">Despachado</option>
		<option value="Entregado">Entregado</option>
		<option value="Cancelado">Cancelado</option>
	</select><br-->
	<input type="submit" value="Buscar">
</form>
<form action="#" method="POST">
	Pedido listo, pasa a "Pendiente": <input type="number" name="pendiente" placeholder=" id del pedido">
	<input type="submit" value="Listo">
</form>	
<form action="#" method="POST">
	Pedido auto-asignado, pasa a "Asignado": <input type="number" name="asignado" placeholder=" id del pedido">
	Repartidor: <input type="number" name="id_repartidor" placeholder=" id del Repartidor">
	<input type="submit" value="Asignar">
</form>	
<form action="#" method="POST">
	Pedido retirado, pasa a "Despachado": <input type="number" name="despachado" placeholder=" id del pedido">
	Tiempo de entrega: <input type="number" name="tiempo_estimado" placeholder=" tiempo en minutos">
	<input type="submit" value="Despachar">
</form>	
<form action="#" method="POST">
	Pedido entregado, pasa a "Entregado": <input type="number" name="entregado" placeholder=" id del pedido">
	<input type="submit" value="Entregado">
</form>	


<?php
$daoP->pedidolisto($pendiente);
$daoP->asignarPedido($asignado, $id_repartidor);
$daoP->despacharPedido($despachado, $tiempo_estimado);
$daoP->entregarPedido($entregado);

echo"<h2>Pedidos Elaborandose del comercio $id_comercio</h2>";

$pedidosComercio = $daoP->getPedidosComercioByEstado($id_comercio,'Elaborandose');
echo "<pre>";
	print_r($pedidosComercio);
echo"</pre>";

echo"<h2>Pedidos Pendientes del comercio $id_comercio</h2>";

$pedidosComercio = $daoP->getPedidosComercioByEstado($id_comercio,'Pendiente');
echo "<pre>";
	print_r($pedidosComercio);
echo"</pre>";

echo"<h2>Pedidos Asignados al Repartidor $id_repartidor</h2>";

$pedidosComercio = $daoP->getPedidosComercioByEstado($id_comercio,'Asignado');
echo "<pre>";
	print_r($pedidosComercio);
echo"</pre>";

echo"<h2>Pedidos Despachados del comercio $id_comercio</h2>";

$pedidosComercio = $daoP->getPedidosComercioByEstado($id_comercio,'Despachado');
echo "<pre>";
	print_r($pedidosComercio);
echo"</pre>";

echo"<h2>Pedidos Entregados del comercio $id_comercio</h2>";

$pedidosComercio = $daoP->getPedidosComercioByEstado($id_comercio,'Entregado');
echo "<pre>";
	print_r($pedidosComercio);
echo"</pre>";


?>