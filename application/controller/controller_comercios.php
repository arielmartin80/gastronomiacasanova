<?php
class Controller_Comercios extends Controller{

    function listadoComercios(){

        $data = $this->model->getAllComercios();
        
        $id_cliente = @$_SESSION['user']['id_cliente'];

          echo '<script>';
          echo 'console.log('. json_encode( $data ) .')';
          echo '</script>';   

          echo '<script>';
          echo 'console.log('. json_encode( $id_cliente ) .')';
          echo '</script>';
        $this->view->generate('listado_de_comercios_view.php', 'template_view.php', $data);

        //vaciamos el carrito
        unset($_SESSION['carrito']);
        unset($_SESSION['monto']);
        unset($_SESSION['idComercio']);

    }


    function verComercio(){

       $this->view->generate('pendiente_aprobacion.php', 'template_view.php');
    }


    function alta_comercio(){
            
        $this->view->generate('alta_comercio_view.php', 'template_view.php');

    }

    function guardar_comercio(){
        
        $data = $_POST;
        $logo['files'] = $_FILES['files1'];
        $banner['files'] = $_FILES['files2'];

        $id_comercio = $this->model->saveComercio($data, $logo, $banner);

        //echo $id_comercio;die();
   
        header("Location: /usuario/activar_comerciante?id_comercio=".$id_comercio);

    }

    function mod_comercio(){
    # echo"<pre>";print_r($_SESSION[]);
      $data = $_SESSION['comercio'];
    # echo"<pre>";print_r($data);
      $this->view->generate('mod_comercio_view.php', 'template_view.php', $data);
    }

    function update_comercio(){

        $data = $_POST;
        $logo['files'] = $_FILES['files1'];
        $banner['files'] = $_FILES['files2'];

        $this->model->update_comercio($data, $logo, $banner);
        $_SESSION['comercio'] = $this->model->getComercioById($data['id']);

        header("Location: /comercios/mod_comercio");

    }


    Function habilitar_comercio(){

        $id = $_GET['id'];
        $this->model->habilitar_comercio($id);

        header('Location: /usuario/listado');

    } 

    Function deshabilitar_comercio(){

        $id = $_GET['id'];
        $this->model->deshabilitar_comercio($id);

        header('Location: /usuario/listado');

    }


}

?>