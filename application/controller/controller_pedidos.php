<?php
class Controller_Pedidos extends Controller{

    function listadoProductos(){

        // Si viene desde botón "agregar al pedido"
        if(isset($_POST['idItem']) && isset($_POST['cantidad']) ){

            $idItem = $_POST['idItem'];
            $cantidad = $_POST['cantidad'];
            @$_SESSION['idComercio'] = $_GET['idComercio'];

            @$_SESSION['carrito'][$idItem] = @$_SESSION['carrito'][$idItem] + $cantidad;

        }

        if(isset($_GET['idComercio'])){
            $data = $this->model->getItemsByComercioId($_GET['idComercio']);
        }


        //$data = $this->model->getAllItems();
            
        $this->view->generate('listado_de_productos_view.php', 'template_view.php', $data);

    }


    function quitarcompra(){

        $id=$_GET['id'];
        unset($_SESSION['carrito'][$id]);
        header('Location: /pedidos/verCompra');

    }


    function verCompra(){

        $productos = array();
        if(isset($_SESSION['carrito']) ){

            foreach ($_SESSION['carrito'] as $id => $value) {
                
                // Guarda los datos del item y la cantidad en el array $registro
                $registro = $this->model->getItemById($id);
                $registro['cantidad'] = $_SESSION['carrito'][$id];

                array_push($productos, $registro);
            }

        }
            
        $this->view->generate('pedido_view.php', 'template_view.php', $productos);

    }


    function confirmar(){

        // Si no existe el carrito o esta vacio, lo crea y redirige a verCompra
        if(!isset($_SESSION['carrito']) || sizeof($_SESSION['carrito']) == 0){
                $_SESSION['carrito'] = array();
                $_SESSION['mje'] = 'Carrito Vacio';
                header('Location: /pedidos/verCompra');
                die();
        }

        $pedido = $_SESSION['carrito'];
        $monto = $_SESSION['monto'];
        
        $this->model->savePedido($pedido, $monto);

        //vaciamos el carrito
        unset($_SESSION['carrito']);
        unset($_SESSION['monto']);

        $data = $this->model->getAllItems();
        header('Location: /comercios/listadoComercios');

    }


    function al_comercio(){

        $id_comercio = @$_SESSION['user']['id_comercio'];
        $data = $this->model->getPedidosByComercio($id_comercio);

        $_SESSION['comercio'] = $this->model->getComercioById($id_comercio);

        $this->view->generate('pedidos_al_comercio_view.php', 'template_view.php', $data);


    }

    function al_cliente(){
        
        $id_cliente = @$_SESSION['user']['id_usuario'];
       
        $data = $this->model->getPedidosByCliente($id_cliente);
        
        $_SESSION['usuario'] = $this->model->getUsuarioById($id_cliente);

        $_SESSION['id_cliente'] = $id_cliente;
        
        $this->view->generate('listado_de_pedidos_ok_cliente.php', 'template_view.php', $data);


    }
    
    function pedidoListoCliente(){
            $id_pedido=$_GET['id'];
            $id_cliente=  $_SESSION['id_cliente'];

            
            //print_r($_SESSION);
           /* echo '<script>';
              echo 'console.log('. json_encode( $id_pedido ) .')';
              echo 'console.log('. json_encode( $id_cliente ) .')';
              echo '</script>';*/
           
            $this->model->pedidoListoCliente($id_pedido,$id_cliente);
            header('Location: /pedidos/al_cliente');
    }

    function pedidoListo(){
            $id_pedido=$_GET['id'];
            $this->model->pedidoListo($id_pedido);
            header('Location: /pedidos/al_comercio');
    }
    

    function pendientes(){

        $data = $this->model->getPedidosByEstado('Pendiente');
        $this->view->generate('pedidos_pendientes_view.php', 'template_view.php', $data);
       

    }

    function asignado(){

        $idPedido = $_GET['id'];
        $idRepartidor = $_SESSION['user']['id_usuario'];

        $data = $this->model->getPedidoById($idPedido);

        if($data['estado'] == 'Despachado'){
            header('Location: /pedidos/entregar?id='.$idPedido);

        }

        if($data['hora_asignado'] == NULL){
 
            // Se actualiza la tabla de pedidos, modificando el estado, agregando hora y agregando el repartidor asignado
           $this->model->asignarPedido($idPedido, $idRepartidor);

            // Se obtiene el detalle del pedido para visualizar
            $data = $this->model->getPedidoById($idPedido);
        }

         $this->view->generate('pedido_asignado_view.php', 'template_view.php', $data);

    }

    function despacharPedido(){

        $id_pedido = $_GET['id'];
        $tiempo_estimado = 30;
        $this->model->despacharPedido($id_pedido, $tiempo_estimado);
        header('Location: /pedidos/al_comercio');

    }

    function entregar(){

        $idPedido = $_GET['id'];

        // Se obtiene el detalle del pedido para visualizar
        $data = $this->model->getPedidoById($idPedido);
        $this->view->generate('pedido_despachado_view.php', 'template_view.php', $data);

    }

    function finalizar(){

        $idPedido = $_GET['id'];

        $penalizado = $this->model->guardarImportes($idPedido);

        $this->view->generate('pedido_finalizado_view.php', 'template_view.php', $penalizado);

    }

    function cancelar(){

        $idPedido = $_GET['id'];
        
        $this->model->cancelarPedidoAsignado($idPedido);
        $this->view->generate('pedido_cancelado_view.php', 'template_view.php');

    }


    function ver_items(){

        $idPedido = @$_GET['id'];
        
        $data = $this->model->getItemsPedidoById($idPedido);
        $this->view->generate('pedido_items_view.php', 'template_view.php', $data);

    }

}

?>