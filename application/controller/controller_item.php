<?php


class Controller_Item extends Controller{

    function listado_de_items(){

        $idComercio = @$_SESSION['user']['id_comercio'];
        $data = $this->model->getItemsByComercioId($idComercio);
			
		$this->view->generate('listado_de_items_view.php', 'template_view.php', $data);

    }

    function mostrar_item(){

        $data = $this->model->getItemById($_GET['id']);
			
		$this->view->generate('mostrar_item_view.php', 'template_view.php', $data);

    }

    function alta_item(){
            
        $this->view->generate('alta_item_view.php', 'template_view.php');

    }

    function upload_item(){
        
        $item['nombre'] = $_POST['nombre'];
        $item['descripcion'] = $_POST['descripcion'];
        $item['precio'] = $_POST['precio'];
        $item['id_comercio'] = @$_SESSION['user']['id_comercio'];

        $this->model->saveItem($item, $_FILES);

        header('Location: /item/listado_de_items?mje=item_agregado_correctamente');

    }

    function baja_item(){

        $this->model->deleteItem($_GET['id']);

        header('Location: /item/listado_de_items?mje=item_eliminado_correctamente');

    }

    function mod_item(){

        $data = $this->model->getItemById($_GET['id']);
            
        $this->view->generate('mod_item_view.php', 'template_view.php', $data);

    }

    function update_item(){

        $item['nombre'] = $_POST['nombre'];
        $item['descripcion'] = $_POST['descripcion'];
        $item['precio'] = $_POST['precio'];
        $item['id'] = $_POST['id'];

        $this->model->updateItem($item ,$_FILES);
            
        header('Location: /item/listado_de_items?mje=item_modificado_correctamente');

    }

}

?>
