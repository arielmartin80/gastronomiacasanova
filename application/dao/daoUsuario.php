<?php
	include_once 'conexion.php';
	include_once 'helper_upload.php';

	class daoUsuario{


	public function getAcceso($email, $clave){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= "SELECT u.id_usuario, u.dni dni, u.cuil cuil, u.nombre nombre, u.apellido apellido, u.direccion direccion, r.nombre rol, u.id_comercio, u.activo
				FROM usuario u JOIN rol r ON r.id_rol = u.id_rol 
			   	WHERE u.email = '$email' AND u.contrasenia = SHA2('$clave',224) ";

		//echo $SQL;die();

		$result = mysqli_query($conn, $SQL) ;    
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		$conexion->desconectar();

        return @$data;

	}


	public function getRolByidUsuario($id_usuario){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= "	SELECT r.nombre 
				FROM rol r JOIN usuario u ON r.id_rol = u.id_rol 
				WHERE id_usuario = '$id_usuario' ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;    
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		$conexion->desconectar();

		//echo "<pre>";print_r($data);echo"</pre>";

        return $data['nombre'];

	}


	public function getUsuarioById($id){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= "SELECT *	FROM usuario 
			   WHERE id_usuario = '$id' ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;    
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		$data['rol'] = $this->getRolByidUsuario($id);

		$conexion->desconectar();

		//echo "<pre>";print_r($data);echo"</pre>";

        return $data;

	}


	public function getIdComercioByIdUsuario($id_usuario){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= "	SELECT id_comercio	
				FROM usuario 
			   	WHERE id = '$id_usuario' ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;    
		if ($result) {  
			$data = mysqli_fetch_array($result);
		}

		$conexion->desconectar();

        return $data['id'];

	}

	public function saveUsuario($usuario, $FILES){

		//guarda los elementos del usuario en la bd y retorna el id con el que se guardo

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		//echo "<pre>";print_r($usuario);echo"</pre>";

		$contrasenia = hash('sha224', $usuario['pass']);
		$id_rol = $usuario['rol']['id_rol'];

		if($id_rol == 4) $activo = true;
		if($id_rol != 4) $activo = false;

		$SQL= 	"INSERT INTO usuario 
				( dni, cuil, nombre, apellido, direccion, email, contrasenia, id_rol, id_comercio, activo) 
				 VALUES 
				 ('$usuario[dni]', '$usuario[cuil]', '$usuario[nombre]','$usuario[apellido]', '$usuario[direccion]', '$usuario[email]', '$contrasenia', '$id_rol', NULL, '$activo' )";

		//echo $SQL;

		mysqli_query($conn, $SQL) ; 

		//obtenemos en numero de id que se genero
			$query2="SELECT MAX(id_usuario) AS id FROM usuario"; 
			$result = mysqli_query($conn, $query2); // ejecuta la consulta para recuperar el id
			$row=@mysqli_fetch_array($result);
			$id=$row['id'];
	
		//echo $query2;die();

			upload_jpg($FILES, "application/resources/img/usuarios/", $id);

		return $id;

		$conexion->desconectar();

	}

	public function update_user($data){
		print_r($data);
		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL = 	"UPDATE usuario 
				 SET 	nombre = '$data[nombre]', 
				 		apellido = '$data[apellido]', 
				 		dni = '$data[dni]',
				 		cuil = '$data[cuil]', 
				 		direccion = '$data[direccion]'
				 WHERE id_usuario = '$data[id_usuario]' ";
		echo $SQL;

		$result = mysqli_query($conn, $SQL) ;

		//modificamos la imagen
		/*if($logo['files']['error'] == 0){
			upload_jpg($logo, "application/resources/img/usuarios/", $data['id']);
		}*/

		$conexion->desconectar();
		

		}

	function getEstadoComercioById($id_comercio){

		$conexion = new Conexion();
		$conn=$conexion->conectar();

		$SQL= 	"	SELECT activo
					FROM comercio
					WHERE id = '$id_comercio' ";

		//echo $SQL;die();

		$result = mysqli_query($conn, $SQL) ;   

		if ($result) {  
			$data = mysqli_fetch_array($result);
		} 
  
		return $data['activo'];

		$conexion->desconectar();

	}


	public function getAllUsuarios(){


		$conexion = new Conexion();
		$conn=$conexion->conectar();


		$SQL= "	SELECT *
				FROM usuario ";

		//echo $SQL;

		$result = mysqli_query($conn, $SQL) ;

		if($result){

			while($rows = mysqli_fetch_assoc($result) ){

			$usuarios[$rows['id_usuario']] = [	'dni'=>$rows['dni'],
														'cuil'=>$rows['cuil'],
														'nombre'=>$rows['nombre'],
														'apellido'=>$rows['apellido'],
														'direccion'=>$rows['direccion'],
														'email'=>$rows['email'],
														'id_rol'=>$rows['id_rol'],
														'id_comercio'=>$rows['id_comercio'],
														'activo'=>$rows['activo'],
													];
			
			$usuarios[$rows['id_usuario']]['rol'] = $this->getRolByidUsuario($rows['id_usuario']);
			$usuarios[$rows['id_usuario']]['comercio_activo'] = $this->getEstadoComercioById($rows['id_comercio']);
        	
        	}

        	return $usuarios;
		}

		$conexion->desconectar();

	}


	public function getUsuariosByRol($rol){


		$conexion = new Conexion();
		$conn=$conexion->conectar();


		$SQL= "	SELECT *
				FROM usuario 
				WHERE id_rol = '$rol'	";

		#echo $SQL;die();

		$result = mysqli_query($conn, $SQL) ;

		if($result){

			while($rows = mysqli_fetch_assoc($result) ){

			$usuarios[$rows['id_usuario']] = $rows;
			$usuarios[$rows['id_usuario']]['rol'] = $this->getRolByidUsuario($rows['id_usuario']);
        	
       		}

        return $usuarios;

		}

		$conexion->desconectar();

	}


	public function habilitar_usuario($id){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$SQL = 	"	UPDATE usuario
					SET activo = 1
					WHERE id_usuario = '$id' ";

		$result = mysqli_query($conn, $SQL) ;

		//echo $SQL;die();

		return $result;

		$conexion->desconectar();

	}

	public function deshabilitar_usuario($id){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$SQL = 	"	UPDATE usuario
					SET activo = 0
					WHERE id_usuario = '$id' ";

		$result = mysqli_query($conn, $SQL) ;

		//echo $SQL;die();

		return $result;

		$conexion->desconectar();

	}


	public function asignar_comercio($id_usuario, $id_comercio){

		$conexion = new Conexion();
		$conn = $conexion->conectar();

		$SQL = 	"	UPDATE usuario
					SET id_comercio = '$id_comercio'
					WHERE id_usuario = '$id_usuario' ";

		$result = mysqli_query($conn, $SQL) ;

		//echo $SQL;

		return $result;

		$conexion->desconectar();

	}


}

?>