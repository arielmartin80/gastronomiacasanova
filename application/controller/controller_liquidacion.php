<?php
class Controller_Liquidacion extends Controller{

    function liquidar(){

        $data = $this->model->liquidar('2018-11-26');
            
        $this->view->generate('admin_liquidacion_view.php', 'template_view.php', $data);

    } 

    function verLiquidaciones(){

    if(isset($_GET['id_comercio'])){

        $data = $this->model->getLiquidacionesComercio($_GET['id_comercio']);
    }
    if(isset($_GET['id_repartidor'])){
        
        $data = $this->model->getLiquidacionesRepartidor($_GET['id_repartidor']);
    }

        $this->view->generate('admin_liquidacion_view.php', 'template_view.php', $data);

    }

    function liquidacionesComercio(){

        $id_comercio = $_SESSION['user']['id_comercio'];
        $data = $this->model->getLiquidacionesComercio($id_comercio);
        $this->view->generate('listado_de_liquidaciones_view.php', 'template_view.php', $data);
    }


        function liquidacionesRepartidor(){

        $id_repartidor = $_SESSION['user']['id_usuario'];
        $data = $this->model->getLiquidacionesRepartidor($id_repartidor);
        $this->view->generate('listado_de_liquidaciones_repartidor_view.php', 'template_view.php', $data);
    }


    function verLiquidacionesXcomercio(){
        
        $id_liquidacion = @$_GET['id_liquidacion'];
        $data['sumas'] = $this->model->getSumasLiquidacion($id_liquidacion);
        $data['pedidos'] = $this->model->getDetalleLiquidacion($id_liquidacion);
        $data['ventas'] = $this->model->getCantidadDeVentas($id_liquidacion);
        $data['liquidacion'] = $this->model->getLiquidacion($id_liquidacion);

    	$this->view->generate('comercio_liquidacion_view.php', 'template_view.php', $data);
 
    }


    function verComercios(){

        $data = $this->model->verComercios();
            
        $this->view->generate('admin_verComercios_view.php', 'template_view.php', $data);

    }


    function verRepartidores(){

        $data = $this->model->verRepartidores('3');
            
        $this->view->generate('admin_verRepartidores_view.php', 'template_view.php', $data);

    }


    function nuevaLiquidacion(){
        if(isset($_GET['id_comercio']) ){

            $this->model->liquidarComercio($_GET['id_comercio']);
            header('Location: /liquidacion/verLiquidaciones?id_comercio='.$_GET['id_comercio']);

        }
        if(isset($_GET['id_repartidor']) ){

            $this->model->liquidarRepartidor($_GET['id_repartidor']);
            header('Location: /liquidacion/verLiquidaciones?id_repartidor='.$_GET['id_repartidor']);
        }

        #getListadoImportes() debe reemplazarse por getLiquidacionComercio() o getLiquidacionRepartidor()
        #$data = $this->model->getListadoImportes();
            
        #$this->view->generate('admin_nuevaLiquidacion_view.php', 'template_view.php', $data);

    }


    function importesSinLiquidar(){

        $id_comercio = @$_GET['id_comercio'];
        $id_repartidor = @$_GET['id_repartidor'];

        if($id_comercio != null){
            $data = $this->model->getImportesSinLiquidarComercio($id_comercio);
            #print_r($data);
        } 
        if($id_repartidor != null){
            $data = $this->model->getImportesSinLiquidarRepartidor($id_repartidor);
            #print_r($data);
        } 
        if($_SESSION['user']['rol']=='Administrador'){
            $this->view->generate('admin_nuevaLiquidacion_view.php', 'template_view.php', $data);
        }

        if($_SESSION['user']['rol']!='Administrador'){
            $this->view->generate('pedidos_sin_liquidar.php', 'template_view.php', $data);
        }

    }


}

?>