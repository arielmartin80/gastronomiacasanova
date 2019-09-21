<?php
	include_once 'conexion.php';
	//session_start();

	class daoImportes{

		// Se guardan los importes que le quedan a cada una de las partes, en base al total pagado por el cliente
		public function guardarImportes($id_pedido,$id_comercio, $id_repartidor, $monto_comercio, $monto_repartidor, $monto_sistema, $fecha_pedido){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query = 	"INSERT INTO importes
						(id_pedido, id_comercio, id_repartidor, monto_comercio, monto_repartidor, monto_sistema, fecha_pedido) 
						 VALUES 
						($id_pedido, $id_comercio, $id_repartidor, $monto_comercio, $monto_repartidor, $monto_sistema,'$fecha_pedido')";

			#echo $query;die();

			$result = mysqli_query($conn, $query) ;

			$conexion->desconectar();

		}

		// Se liquidan los importes para cada actor (comercio, repartidor y sistema)
		public function liquidar($fecha){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			//////////////////////////////////////////////////////////////
			///////////////// Importe para cada comercio /////////////////
			//////////////////////////////////////////////////////////////

			$query = "SELECT SUM(i.importe_comerciante) as monto, p.id_comercio as id_comercio FROM pedidos  p
						JOIN importes i ON i.id_pedido = p.id
						WHERE p.hora_inicio > '$fecha' AND p.estado = 'Entregado'
						GROUP BY p.id_comercio";
			$result = mysqli_query($conn, $query);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$id_comercio = $rows['id_comercio'];
					$monto = $rows['monto'];

					$insert = "INSERT INTO liquidaciones_comercios (id_comercio, monto, fecha_desde, fecha_hasta) VALUES ($id_comercio, $monto, '$fecha',  NOW())";

					$result2 = mysqli_query($conn, $insert) ;
				}
			}

			///////////////////////////////////////////////////////////////
			///////////////// Importe para cada repatidor /////////////////
			///////////////////////////////////////////////////////////////


			$query = "SELECT SUM(i.importe_repartidor) as monto, p.id_repartidor as id_repartidor FROM pedidos  p
						JOIN importes i ON i.id_pedido = p.id
						WHERE p.hora_inicio > '$fecha' AND p.estado = 'Entregado'
						GROUP BY p.id_repartidor";

			$result = mysqli_query($conn, $query) ;

			if($result){

				while($rows=mysqli_fetch_assoc($result) ){

					$id_repartidor = $rows['id_repartidor'];
					$monto = $rows['monto'];

					$insert = "INSERT INTO liquidaciones_repartidores (id_repartidor, monto, fecha_desde, fecha_hasta) VALUES ($id_repartidor, $monto, '$fecha',  NOW())";

					$result2 = mysqli_query($conn, $insert) ;
				}
			}

			///////////////////////////////////////////////////////////
			///////////////// Importe para el sistema /////////////////
			///////////////////////////////////////////////////////////


			$query = "SELECT SUM(i.importe_sistema) as monto FROM pedidos  p
						JOIN importes i ON i.id_pedido = p.id
						WHERE p.hora_inicio > '$fecha' AND p.estado = 'Entregado'";
			$result = mysqli_query($conn, $query) ;

			if($result){

				while($rows=mysqli_fetch_assoc($result) ){

					$monto = $rows['monto'];

					$insert = "INSERT INTO liquidaciones_sistema (monto, fecha_desde, fecha_hasta) VALUES ($monto, '$fecha',  NOW())";

					$result2 = mysqli_query($conn, $insert) ;
				}
			}

			$conexion->desconectar();

		}


		// Se guardan los importes que le quedan a cada una de las partes, en base al total pagado por el cliente
		public function verLiquidaciones(){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query = "SELECT id, monto, fecha_desde, fecha_hasta FROM liquidaciones_sistema order by fecha_hasta desc";

			$result = mysqli_query($conn, $query) ;

			if($result){

				while($rows=mysqli_fetch_assoc($result) ){

					$arrayDeLiquidaciones[$rows['id']] = [	"monto"=>$rows['monto'],
												"fecha_desde"=>$rows['fecha_desde'],
												"fecha_hasta"=>$rows['fecha_hasta']
											];

				}

				return @$arrayDeLiquidaciones;
			}
		}

		function getListadoImportes(){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query = "	SELECT *
						FROM importes
					";

			$result = mysqli_query($conn, $query);

			while($rows = mysqli_fetch_assoc($result) ){

				$data[$rows['id_pedido']] = $rows;

				#$pedido = $this->getPedidoById($rows['id_pedido']);
				$data[$rows['id_pedido']]['monto'] = $rows['monto_repartidor']+$rows['monto_sistema']+
				$rows['monto_comercio'];
        	}

			#print_r($data);

			$conexion->desconectar();

			return @$data;

		}


	public function getPorcentaje($rol){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL=  "SELECT porcentaje
				FROM pedidos
				WHERE rol = '$rol' 
				";

		$result = mysqli_query($conn, $SQL) ;  

		if($result){

			$row=mysqli_fetch_assoc($result);
			
		}

		return $row['porcentaje'];

		$conexion->desconectar();

      }


	public function makeLiquidacionComercio($id_comercio){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	SUM(monto_comercio) as ganancia_comercio,
								SUM(monto_repartidor) as ganancia_repartidor,
								SUM(monto_sistema) as ganancia_sistema,
								MIN(fecha_pedido) as fecha_desde,
								MAX(fecha_pedido) as fecha_hasta
						FROM importes
						WHERE id_liquidacion_comercio is null AND id_comercio = $id_comercio
						";

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows = mysqli_fetch_assoc($result)){

					$data = $rows;
				}

			}

		$conexion->desconectar();
		
		return $data;

		}


	public function saveLiquidacionComercio($data){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

		if($data[ganancia_comercio]){

			$SQL = "INSERT INTO liquidaciones (id_comercio, fecha_desde, fecha_hasta, ganancia_repartidor, ganancia_sistema, ganancia_comercio) 
					VALUES ('$data[id_comercio]','$data[fecha_desde]','$data[fecha_hasta]','$data[ganancia_repartidor]','$data[ganancia_sistema]','$data[ganancia_comercio]')";

			$result = mysqli_query($conn, $SQL) ; 
		}
			
		if ($result) {  

			//obtenemos en numero de id que se genero
			$queryMAX = "SELECT MAX(id) AS id FROM liquidaciones";
			$result = mysqli_query($conn, $queryMAX); // ejecuta la consulta para recuperar el id
			$row = @mysqli_fetch_array($result);
			$liquidacion_id = $row['id'];


			$queryUP = 	"	UPDATE 	importes 
				 			SET 	id_liquidacion_comercio = $liquidacion_id 
							WHERE 	id_comercio = $data[id_comercio]
							AND 	id_liquidacion_comercio is NULL";

			mysqli_query($conn, $queryUP) ;

		}

		$conexion->desconectar();

		}


	public function getLiquidacionesComercio($id_comercio){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	*
						FROM liquidaciones
						WHERE id_comercio = $id_comercio
						order by fecha_desde desc
						";

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data[$rows['id']] = $rows;
				}

			}

		$conexion->desconectar();

		return @$data;

		}


	public function makeLiquidacionRepartidor($id_repartidor){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	SUM(monto_comercio) as ganancia_comercio,
								SUM(monto_repartidor) as ganancia_repartidor,
								SUM(monto_sistema) as ganancia_sistema,
								MIN(fecha_pedido) as fecha_desde,
								MAX(fecha_pedido) as fecha_hasta
						FROM importes
						WHERE id_liquidacion_repartidor is null AND id_repartidor = $id_repartidor
						";

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data = $rows;
				}

			}


#echo $query1;die();
		$conexion->desconectar();

		return $data;

		}


	public function saveLiquidacionRepartidor($data){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

		if($data[ganancia_repartidor]){

			$SQL = "INSERT INTO liquidaciones (id_repartidor, fecha_desde, fecha_hasta, ganancia_repartidor, ganancia_sistema, ganancia_comercio) 
					VALUES ('$data[id_repartidor]','$data[fecha_desde]','$data[fecha_hasta]','$data[ganancia_repartidor]','$data[ganancia_sistema]','$data[ganancia_comercio]')";

			$result = mysqli_query($conn, $SQL) ; 
		}
			
		if ($result) {  

			//obtenemos en numero de id que se genero
			$queryMAX = "SELECT MAX(id) AS id FROM liquidaciones";
			$result = mysqli_query($conn, $queryMAX); // ejecuta la consulta para recuperar el id
			$row = @mysqli_fetch_array($result);
			$liquidacion_id = $row['id'];


			$queryUP = 	"	UPDATE 	importes 
				 			SET 	id_liquidacion_repartidor = $liquidacion_id 
							WHERE 	id_repartidor = $data[id_repartidor]
							AND 	id_liquidacion_repartidor is NULL";

			mysqli_query($conn, $queryUP) ;

		}

		$conexion->desconectar();

		}


	public function getLiquidacionesRepartidor($id_repartidor){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	*
						FROM liquidaciones
						WHERE id_repartidor = $id_repartidor
						order by fecha_desde desc
						";

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data[$rows['id']] = $rows;
				}

			}

		$conexion->desconectar();

		return @$data;

		}	

	public function getImportesSinLiquidarComercio($id_comercio){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	*
						FROM importes
						WHERE id_comercio = $id_comercio
						AND id_liquidacion_comercio is null;
						";

			#echo $query1;

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data[$rows['id']] = $rows;
					$data[$rows['id']]['monto'] = $rows['monto_comercio']+$rows['monto_repartidor']+$rows['monto_sistema'];
				}

			}

		$conexion->desconectar();

		return @$data;

		}


		public function getImportesSinLiquidarRepartidor($id_repartidor){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	*
						FROM importes
						WHERE $id_repartidor = $id_repartidor
						AND id_liquidacion_repartidor is null
						ORDER BY fecha_pedido DESC
						";

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data[$rows['id']] = $rows;
					$data[$rows['id']]['monto'] = $rows['monto_comercio']+$rows['monto_repartidor']+$rows['monto_sistema'];
				}

			}

		$conexion->desconectar();

		return @$data;

		}


	public function getDetalleLiquidacion($id_liquidacion){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 	*
						FROM importes
						WHERE id_liquidacion_comercio = $id_liquidacion
						OR id_liquidacion_repartidor = $id_liquidacion
						ORDER BY fecha_pedido DESC
						";

			#echo $query1;

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data[$rows['id']] = $rows;
					$data[$rows['id']]['monto'] = $rows['monto_comercio']+$rows['monto_repartidor']+$rows['monto_sistema'];
				}

			}

		$conexion->desconectar();

		return @$data;

		}


	public function getCantidadDeVentas($id_liquidacion){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT 
    					count(1) as ventas
						FROM importes 

						Where id_liquidacion_comercio = $id_liquidacion
						OR id_liquidacion_repartidor = $id_liquidacion
						
						";

			#echo $query1;

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data = $rows;
				}

			}

		$conexion->desconectar();

		return @$data['ventas'];


	}



	public function getSumasLiquidacion($id_liquidacion){

					$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT fecha_pedido,
    					sum(monto_comercio) as total_comercio 
    					,sum(monto_repartidor) as tolal_repartidor
						FROM importes 

						Where id_liquidacion_comercio = $id_liquidacion
						OR id_liquidacion_repartidor = $id_liquidacion
						Group by fecha_pedido
						";

			#echo $query1;

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data[$rows['fecha_pedido']] = $rows;
				}

			}

		$conexion->desconectar();

		return @$data;

		}


	public function getCantidadDeClientes($id_liquidacion){

					$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT count(DISTINCT id_cliente) as clientes 
    					
						FROM importes as i
						inner join pedidos as p
						on i.id_pedido = p.id

						Where id_liquidacion_comercio = $id_liquidacion
						OR id_liquidacion_repartidor = $id_liquidacion
						Group by id_cliente
						";

			#echo $query1;

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data = $rows;
				}

			}

		$conexion->desconectar();

		return @$data['clientes'];

		}	


	public function getLiquidacion($id_liquidacion){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query1 = "	SELECT *
						FROM liquidaciones
						Where id = $id_liquidacion
						";

			#echo $query1;

			$result = mysqli_query($conn, $query1);

			if($result){
				while($rows=mysqli_fetch_assoc($result)){

					$data = $rows;
				}

			}

			if($data['id_comercio'] == 0){
				$data['rol'] = "Repartidor";
			}

			if($data['id_repartidor'] == 0){
				$data['rol'] = "Comercio";
			}

			$data['ventas'] = $this->getCantidadDeVentas($id_liquidacion);
			$data['clientes'] = $this->getCantidadDeClientes($id_liquidacion);

		$conexion->desconectar();

		return @$data;

		}



	}


?>