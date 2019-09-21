<?php

function upload_jpg($FILES, $ruta, $file_name){

$file_name=$file_name.".jpg";
$tmp=$FILES['files']['tmp_name'];


	//verificar que sea imagen
	if($FILES['files']['type'] == 'image/jpeg' || $FILES['files']['type'] == 'image/png'){

		$control = true;
	}

	$ruta = $ruta.$file_name;

	if(!empty($file_name) AND (@$control == true) ){
	
		$control = move_uploaded_file($tmp , $ruta);
	}
	else
	{
		copy("application/resources/img/null.jpg", $ruta);
	}


	return @$control;

}


function delete_jpg($ruta, $file_name){

$file_name = $file_name.".jpg";

	if(!empty($file_name)){
		//se elimina la imagen del servidor
		$control=unlink($ruta.$file_name);
	}

	return $control;

}


?>