<?php
	include_once 'conexion.php';
	//session_start();

	class daoPedidos{


	public function getPedidoById($id_pedido){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL=  "SELECT p.id, p.estado, p.id_comercio, p.id_cliente, p.id_repartidor, p.hora_inicio,p.hora_listo, p.hora_asignado, p.hora_despachado, p.hora_estimada, p.hora_finalizacion, p.direccion_destino, c.razonSocial, c.puntoDeVenta, c.categoria, c.zonaCobertura, u.nombre, u.apellido, u.direccion, p.monto
				FROM pedidos as p JOIN comercio as c JOIN usuario as u
				ON c.id = p.id_comercio AND u.id_usuario = p.id_cliente
				WHERE p.id = '$id_pedido' 
				";

		$result = mysqli_query($conn, $SQL) ;  

		if($result){

			while($row=mysqli_fetch_assoc($result) ){

			$pedido = [	"id"=>$row['id'],
						"estado"=>$row['estado'],
						"id_comercio"=>$row['id_comercio'],
						"id_cliente"=>$row['id_cliente'],
						"id_repartidor"=>$row['id_repartidor'],
						"hora_inicio"=>$row['hora_inicio'],
						"hora_listo"=>$row['hora_listo'],
						"hora_asignado"=>$row['hora_asignado'],
						"hora_despachado"=>$row['hora_despachado'],
						"hora_estimada"=>$row['hora_estimada'],
						"hora_finalizacion"=>$row['hora_finalizacion'],
						"razonSocial"=>$row['razonSocial'],
						"puntoDeVenta"=>$row['puntoDeVenta'],
						"categoria"=>$row['categoria'],
						"zonaCobertura"=>$row['zonaCobertura'],
						"nombre"=>$row['nombre'],
						"apellido"=>$row['apellido'],
						"direccion"=>$row['direccion'],
						"direccion_destino"=>$row['direccion_destino'],
						"monto"=>$row['monto']		
					];
	
        	}
			
		}

		return $pedido;

		$conexion->desconectar();

      }


	public function getItemsPedidoById($id_pedido){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL=  "SELECT *
				FROM items_pedidos as p 
				inner join items as i
				on p.id_item = i.id
				WHERE id_pedido = '$id_pedido' ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;    
		
		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDeItems[$rows['id']] = $rows;
	
        	}
			
			return @$arrayDeItems;
		}

		$conexion->desconectar();

		

      }


    public function getPedidosByEstado($estado){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL=  "SELECT p.id, p.estado, p.id_comercio, p.id_cliente, p.id_repartidor, p.hora_inicio,p.hora_listo, p.hora_asignado, p.hora_despachado, p.hora_estimada, p.hora_finalizacion, p.direccion_destino, c.razonSocial, c.puntoDeVenta, c.categoria, c.zonaCobertura, u.nombre, u.apellido, u.direccion
				FROM pedidos as p JOIN comercio as c JOIN usuario as u
				WHERE c.id = p.id_comercio AND u.id_usuario = p.id_cliente
				AND p.estado = '$estado' 
				ORDER BY p.hora_inicio ASC";

		//echo"<br><br><br>";
		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;  
		$arrayDePedidos = null;

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDePedidos[$rows['id']] = [	"estado"=>$rows['estado'],
												"id_comercio"=>$rows['id_comercio'],
												"id_cliente"=>$rows['id_cliente'],
												"id_repartidor"=>$rows['id_repartidor'],
												"hora_inicio"=>$rows['hora_inicio'],
												"hora_listo"=>$rows['hora_listo'],
												"hora_asignado"=>$rows['hora_asignado'],
												"hora_despachado"=>$rows['hora_despachado'],
												"hora_estimada"=>$rows['hora_estimada'],
												"hora_finalizacion"=>$rows['hora_finalizacion'],
												"razonSocial"=>$rows['razonSocial'],
												"puntoDeVenta"=>$rows['puntoDeVenta'],
												"categoria"=>$rows['categoria'],
												"zonaCobertura"=>$rows['zonaCobertura'],
												"nombre"=>$rows['nombre'],
												"apellido"=>$rows['apellido'],
												"direccion"=>$rows['direccion'],
												"direccion_destino"=>$rows['direccion_destino']	
											];
	
        	}
			
		}

		return $arrayDePedidos;

		$conexion->desconectar();

      } 


    public function getPedidosByComercio($id_comercio){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL=  "SELECT p.id, p.estado, p.id_comercio, p.id_cliente, p.id_repartidor, p.hora_inicio,p.hora_listo, p.hora_asignado, p.hora_despachado, p.hora_estimada, p.hora_finalizacion, p.direccion_destino, c.razonSocial, c.puntoDeVenta, c.categoria, c.zonaCobertura, u.nombre, u.apellido, u.direccion, p.monto
				FROM pedidos as p JOIN comercio as c JOIN usuario as u
				WHERE c.id = p.id_comercio AND u.id_usuario = p.id_cliente
				AND p.id_comercio = '$id_comercio' 
				ORDER BY p.hora_inicio asc ";

		//echo"<br><br><br>";
		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;  
		$arrayDePedidos = null;

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDePedidos[$rows['id']] = $rows;
	
        	}
			
		}
			
		return $arrayDePedidos;

		$conexion->desconectar();

      }


	public function getPedidosComercioByEstado($id_comercio, $estado){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL=  "SELECT p.id, p.estado, p.id_comercio, p.id_cliente, p.id_repartidor, p.hora_inicio,p.hora_listo, p.hora_asignado, p.hora_despachado, p.hora_estimada, p.hora_finalizacion, p.direccion_destino, c.razonSocial, c.puntoDeVenta, c.categoria, c.zonaCobertura, u.nombre, u.apellido, u.direccion
				FROM pedidos as p JOIN comercio as c JOIN usuario as u
				WHERE c.id = p.id_comercio AND u.id_usuario = p.id_cliente
				AND p.id_comercio = '$id_comercio' AND p.estado = '$estado'
				ORDER BY p.hora_inicio ASC";

		//echo"<br><br><br>";
		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;  
		$arrayDePedidos = null;

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDePedidos[$rows['id']] = [	"estado"=>$rows['estado'],
												"id_comercio"=>$rows['id_comercio'],
												"id_cliente"=>$rows['id_cliente'],
												"id_repartidor"=>$rows['id_repartidor'],
												"hora_inicio"=>$rows['hora_inicio'],
												"hora_listo"=>$rows['hora_listo'],
												"hora_asignado"=>$rows['hora_asignado'],
												"hora_despachado"=>$rows['hora_despachado'],
												"hora_estimada"=>$rows['hora_estimada'],
												"hora_finalizacion"=>$rows['hora_finalizacion'],
												"razonSocial"=>$rows['razonSocial'],
												"puntoDeVenta"=>$rows['puntoDeVenta'],
												"categoria"=>$rows['categoria'],
												"zonaCobertura"=>$rows['zonaCobertura'],
												"nombre"=>$rows['nombre'],
												"apellido"=>$rows['apellido'],
												"direccion"=>$rows['direccion'],
												"direccion_destino"=>$rows['direccion_destino']	
											];
	
        	}
			
		}




		return $arrayDePedidos;

		$conexion->desconectar();

    }  


    public function getPedidosByCliente($id_cliente){
    	
		$conexion = new Conexion();
		$conn=$conexion->conectar();

		//$SQL=  "SELECT * FROM pedidos WHERE id_cliente =".$id_cliente." ;";

		$SQL=  "SELECT p.id, p.estado, p.id_comercio, p.id_cliente, p.id_repartidor, p.hora_inicio,p.hora_listo, p.hora_asignado, p.hora_despachado, p.hora_estimada, p.hora_finalizacion, p.direccion_destino, c.razonSocial, c.puntoDeVenta, c.categoria, c.zonaCobertura, u.nombre, u.apellido, u.direccion, p.monto
				FROM pedidos as p JOIN comercio as c JOIN usuario as u
				WHERE c.id = p.id_comercio AND u.id_usuario = p.id_cliente
				AND p.id_cliente = '$id_cliente' 
				ORDER BY p.hora_inicio desc ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;  

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDePedidos[$rows['id']] = [	"estado"=>$rows['estado'],
												"id_comercio"=>$rows['id_comercio'],
												"id_cliente"=>$rows['id_cliente'],
												"id_repartidor"=>$rows['id_repartidor'],
												"hora_inicio"=>$rows['hora_inicio'],
												"hora_listo"=>$rows['hora_listo'],
												"hora_asignado"=>$rows['hora_asignado'],
												"hora_despachado"=>$rows['hora_despachado'],
												"hora_estimada"=>$rows['hora_estimada'],
												"hora_finalizacion"=>$rows['hora_finalizacion'],
												"razonSocial"=>$rows['razonSocial'],
												"puntoDeVenta"=>$rows['puntoDeVenta'],
												"categoria"=>$rows['categoria'],
												"zonaCobertura"=>$rows['zonaCobertura'],
												"nombre"=>$rows['nombre'],
												"apellido"=>$rows['apellido'],
												"direccion"=>$rows['direccion'],
												"direccion_destino"=>$rows['direccion_destino'],
												"monto"=>$rows['monto']
											];
	
        	}
			
			return @$arrayDePedidos;
		}
		
		$conexion->desconectar();

		

      }
	

	public function getIdComercioByItem($id_item){

		$conexion = new Conexion();
		$conn = $conexion->conectar();


		$query1 = 	"SELECT id_comercio
					 FROM items
					 WHERE id = '$id_item' ";

		//echo $query1;

		$result = mysqli_query($conn, $query1) ;
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		//echo $data['id_comercio'];

		return $data['id_comercio'];

	}


	public function savePedido($data, $monto){
		
	
		$id_comercio = $this->getIdComercioByItem( key($data) );
		$id_usuario = $_SESSION['user']['id_usuario'];
		//echo"monto:". $monto."<br>";print_r($data);die();

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		//creamos el pedido
		$query1 = 	"INSERT INTO pedidos ( estado, id_comercio, id_cliente, hora_inicio , monto) 
				 	 VALUES ('Elaborandose','$id_comercio','$id_usuario', NOW() , $monto)";

		//echo $query1;

		$result = mysqli_query($conn, $query1) ;

		if ($result) {  

		//obtenemos en numero de id que se genero
			$query2="SELECT MAX(id) AS id FROM pedidos";
			$result = mysqli_query($conn, $query2); 
			$row=@mysqli_fetch_array($result);
			$items_pedidos_id=$row['id'];

		//guardamos los items asociados al id del pedido creado
		foreach ($data as $item => $cantidad) {
		
			$query3 = 	"INSERT INTO items_pedidos ( id_item , cantidad , id_pedido) 
				 	 	 VALUES ('$item' , '$cantidad' , '$items_pedidos_id' )	";
		
			//echo "<br>".$query3."<br>";
				 	 
			$result = mysqli_query($conn, $query3) ;
        	}

		}

		$conexion->desconectar();

	}

	//este metodo lo debe usar el comercio para indicar en que momento el pedido esta listo para ser retirado
	public function pedidoListo($id_pedido){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$query1 = 	"UPDATE pedidos
					 SET estado = 'Pendiente', hora_listo = NOW()
					 WHERE id = '$id_pedido' ";

		$result = mysqli_query($conn, $query1) ;

		//echo $result;

		return $result;

	}
	//este metodo lo debe usar el Cliente para indicar en que momento el pedido fue Recibido
	public function pedidoListoCliente($id_pedido,$id_Cliente){

		echo $id_pedido." ". $id_Cliente ;

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$query1 = 	"UPDATE pedidos
					 SET estado = 'Recibido', hora_finalizacion = NOW()
					 WHERE id = '$id_pedido' 
					 AND id_cliente ='$id_Cliente'";
		//echo $query1;			 
		$result = mysqli_query($conn, $query1) ;

		//echo $result;

		return $result;

	}

	
	//este metodo lo debe usar el repartidor para asignarse el pedido
	public function asignarPedido($id_pedido, $id_repartidor){

		$conexion = new Conexion();
		$conn = $conexion->conectar();


		$query1 = 	"UPDATE pedidos
					 SET estado = 'Asignado', id_repartidor = '$id_repartidor', hora_asignado = NOW()
					 WHERE id = '$id_pedido' ";

		//echo $query1;

		$result = mysqli_query($conn, $query1) ;

		return $result;

	}
	

	//este metodo lo debe usar el comercio para indicar en que momento salio el pedido de su local
	public function despacharPedido($id_pedido, $tiempo_estimado){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$query1 = 	"UPDATE pedidos
					 SET estado = 'Despachado', hora_despachado = NOW(), hora_estimada = ADDTIME(NOW(),'00:$tiempo_estimado:00')
					 WHERE id = '$id_pedido' ";

		$result = mysqli_query($conn, $query1) ;

		//echo $result;

		return $result;

	}

	//este metodo lo debe usar el repartidor para indicar en que momento se entrego el pedido al cliente
	public function entregarPedido($id_pedido){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$query1 = 	"UPDATE pedidos
					 SET estado = 'Entregado', hora_finalizacion = NOW()
					 WHERE id = '$id_pedido' ";

		$result = mysqli_query($conn, $query1) ;

		if ($result) {  // Obtenemos los minutos de demora tolerables
			$query2="SELECT c.tiempo_estimado AS tiempoEst FROM comercio c JOIN pedidos p on p.id_comercio = c.id WHERE p.id = '$id_pedido' ";
			$result2 = mysqli_query($conn, $query2);
			$result2=mysqli_fetch_assoc($result2); 
			$tiempo_estimado_adicional = $result2['tiempoEst'] * 0.15; // Se agregan el 15% de tolerancia de demora
		}

		//echo $query1;
		if ($result2) {  
			// Obtenemos las horas para chequear penalizaciones
			$query2="SELECT ADDTIME(hora_estimada, '00:$tiempo_estimado_adicional:00') AS horaTolerancia, hora_finalizacion AS horaFin FROM pedidos WHERE id = '$id_pedido' ";
			$result3 = mysqli_query($conn, $query2);
			$result3=mysqli_fetch_assoc($result3); 
		}

		#print_r($result3);die();
		
		return @$result3;

	}

	//este metodo lo debe usar el repartidor para indicar que no retirara el pedido que se habia auto-asignado
	public function cancelarPedidoAsignado($id_pedido){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$query1 = 	"UPDATE pedidos
					 SET estado = 'Cancelado', hora_finalizacion = NOW()
					 WHERE id = '$id_pedido' ";

		$result = mysqli_query($conn, $query1) ;

		//echo $query1;

		return $result;

	}

	public function getFechaPedido($id_pedido){

			$conexion = new Conexion();
			$conn = $conexion->conectar();

			$query = "	SELECT date(hora_inicio)
						FROM pedidos
						WHERE id = '$id_pedido'	";

			#echo($query);die();

			$result = mysqli_query($conn, $query);

			if ($result) {  
				$data = mysqli_fetch_array($result);
			}

			#print_r($data[0]);die();

			$conexion->desconectar();
			return $data[0];
		}

}


?>