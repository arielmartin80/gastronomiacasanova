<?php
	include_once 'conexion.php';
	include_once 'helper_upload.php';

	class daoItem{


	public function getAllItems(){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		//$SQL= "SELECT i.id, i.nombre, i.descripcion, p.precio 
		//		FROM items AS i JOIN precio AS p ON i.id = p.id_item";

		$SQL= "	SELECT id, nombre, descripcion , precio
				FROM items ORDER BY id desc";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDeItems[$rows['id']] = ['nombre'=>$rows['nombre'],'descripcion'=>$rows['descripcion'],'precio'=>$rows['precio'] ];
	
        	}

        	return $arrayDeItems;
		}

		$conexion->desconectar();

	}

	public function getItemById($item_id){


		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= " SELECT * FROM items WHERE id='$item_id' ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;    
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		$conexion->desconectar();

		return $data;

	/*####################################################################
		//datos harcodeados (formato del array que retorna el metodo)

		$item['id']=$id_item;
		$item['nombre']="Pizza";
		$item['descripcion']="Pizza de muzzarela grande";
		$item['precio']="150";
		$item['id_comercio']

        return $item;	
	######################################################################*/

	}

	public function getItemsByComercioId($comercio_id){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$arrayDeItems = null;

		$SQL= "	SELECT id, nombre, descripcion , precio, id_comercio
				FROM items where id_comercio = $comercio_id ORDER BY id desc";

		$result = mysqli_query($conn, $SQL) ;

		if($result){

			while($rows=mysqli_fetch_assoc($result) ){

			$arrayDeItems[$rows['id']] = ["nombre"=>$rows['nombre'],"descripcion"=>$rows['descripcion'],"precio"=>$rows['precio'],"id_comercio"=>$rows['id_comercio'] ];
	
        	}

        	return $arrayDeItems;
		}

		$conexion->desconectar();

	}


	public function saveItem($item, $FILES){

		//guarda los elementos del item en la bd y retorna el id con el que se guardo

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= 	"INSERT INTO items ( nombre , descripcion , precio, id_comercio) 
				 VALUES ('$item[nombre]' , '$item[descripcion]' , '$item[precio]', '$item[id_comercio]' )";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ; 

		if ($result) {  

		//obtenemos en numero de id que se genero
			$query2="SELECT MAX(id) AS id FROM items"; 
			$result = mysqli_query($conn, $query2); // ejecuta la consulta para recuperar el id
			$row=@mysqli_fetch_array($result);
			$item_id=$row['id'];
	
			upload_jpg($FILES, "application/resources/img/items/", $item_id);

		return $item_id;

		}

		$conexion->desconectar();

		

	}


	public function deleteItem($item_id){

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
		
		}

		
	public function updateItem($item, $FILES){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL = 	"UPDATE items 
				 SET 	nombre = '$item[nombre]', 
				 		descripcion = '$item[descripcion]', 
				 		precio = '$item[precio]'
				 WHERE id = '$item[id]' ";

		#echo $SQL;die();

		$result = mysqli_query($conn, $SQL) ;

		
		//modificamos la imagen
		if($FILES['files']['error'] == 0){
			upload_jpg($FILES, "application/resources/img/items/", $item['id']);
		}

		$conexion->desconectar();
		

		}
	

}

?>