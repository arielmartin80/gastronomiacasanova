<?php
	include_once 'conexion.php';
	include_once 'helper_upload.php';

	class daoComercio{


	public function getAllComercios(){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= "	SELECT *
				FROM comercio 
				WHERE activo = 1
				ORDER BY id desc";

		$result = mysqli_query($conn, $SQL) ;

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDeComercios[$rows['id']] = $rows;
	
        	}

        	return $arrayDeComercios;
		}

		$conexion->desconectar();

	}

	public function getComercioById($comercio_id){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= " SELECT * FROM comercio WHERE id='$comercio_id' ";

		$result = mysqli_query($conn, $SQL) ;    
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		$conexion->desconectar();

		return $data;

	}

	

	public function saveComercio($comercio, $logo, $banner){

		//guarda los elementos del comercio en la bd y retorna el id con el que se guardo

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= 	"INSERT INTO comercio 
				( razonSocial, puntoDeVenta, tiempo_estimado, categoria, zonaCobertura, tel, mailto) 
				 VALUES 
				 ('$comercio[razonSocial]', '$comercio[puntoDeVenta]', '$comercio[tiempo_estimado]', '$comercio[categoria]', '$comercio[zonaCobertura]', '$comercio[tel]', '$comercio[mailto]' )";

		//echo $SQL;die();

		$result = mysqli_query($conn, $SQL) ; 
  

		//obtenemos en numero de id que se genero
			$query2="SELECT MAX(id) as id FROM comercio "; 
			$result = mysqli_query($conn, $query2); // ejecuta la consulta para recuperar el id
			$row = @mysqli_fetch_array($result);
			$id_comercio = $row['id'];
	
			upload_jpg($logo, "application/resources/img/comercios/", $id_comercio);
			upload_jpg($banner, "application/resources/img/banners/", $id_comercio);

			//echo $query2;echo $id_comercio;die();

		return $id_comercio;

		$conexion->desconectar();

	}


	public function deleteComercio($comercio_id){
/*
		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= 	"DELETE FROM items
				 WHERE id = '$item_id' ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;

		$file_name=$item_id.".jpg";

			if(!empty($file_name)){
				//se elimina la imagen del servidor
				$control=unlink("application/resources/img/items/".$file_name);
				echo $control;
			}
		
		$conexion->desconectar();
	*/	
		}

		
	public function update_comercio($data, $logo, $banner){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL = 	"UPDATE comercio 
				 SET 	razonSocial = '$data[razonSocial]', 
				 		puntoDeVenta = '$data[puntoDeVenta]', 
				 		tiempo_estimado = '$data[tiempo_estimado]',
				 		categoria = '$data[categoria]', 
				 		zonaCobertura = '$data[zonaCobertura]', 
				 		tel = '$data[tel]',
				 		mailto = '$data[mailto]'
				 WHERE id = '$data[id]' ";

		#echo $SQL;die();

		$result = mysqli_query($conn, $SQL) ;

		//modificamos la imagen
		if($logo['files']['error'] == 0){
			upload_jpg($logo, "application/resources/img/comercios/", $data['id']);
		}
		if($banner['files']['error'] == 0){
			upload_jpg($banner, "application/resources/img/banners/", $data['id']);
		}

		$conexion->desconectar();
		

		}


	public function habilitar_comercio($id){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$SQL = 	"	UPDATE comercio
					SET activo = 1
					WHERE id = '$id' ";

		$result = mysqli_query($conn, $SQL) ;

		#echo $SQL;die();

		return $result;

		$conexion->desconectar();

	}

	public function deshabilitar_comercio($id){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$SQL = 	"	UPDATE comercio
					SET activo = 0
					WHERE id = '$id' ";

		$result = mysqli_query($conn, $SQL) ;

		#echo $SQL;die();

		return $result;

		$conexion->desconectar();

	}
	

}

?>