<?php

class Controller_Login extends Controller{

    function comprobarUsuario(){

        $data = $this->model->getAcceso(@$_POST['email'],@$_POST['clave']);

        if($data['activo'] == 1){
            $_SESSION['user'] = $data;
        } 

        if($data['rol'] == 'Administrador' AND $data['activo'] == 1){ 

            //$this->view->generate('perfil_view.php', 'template_view.php', $data);
            header('Location: /usuario/listado');
        } 

        elseif($data['rol'] == 'Comerciante' AND $data['activo'] == 1){ 
			//$this->view->generate('home_comerciante_view.php', 'template_view.php', $data);
            //header('Location: /item/listado_de_items');
            header('Location: /pedidos/al_comercio');

        }

        elseif($data['rol'] == 'Repartidor' AND $data['activo'] == 1){ 
            //$this->view->generate('home_repartidor_view.php', 'template_view.php', $data);
            header('Location: /pedidos/pendientes');
        }

        elseif($data['rol'] == 'Cliente' AND $data['activo'] == 1){ 
			//$this->view->generate('home_cliente_view.php', 'template_view.php', $data);
            header('Location: /comercios/listadoComercios');
        }

        else{
            $data['mje']='Cuenta sin acceso';            
			$this->view->generate('main_view.php', 'template_view.php', $data);
        }
        
    }


    function home(){

  
        $data = @$_SESSION['user'] ;
 

        if($data['rol'] == 'Administrador' AND $data['activo'] == 1){ 

            //$this->view->generate('perfil_view.php', 'template_view.php', $data);
            header('Location: /usuario/listado');
        } 

        elseif($data['rol'] == 'Comerciante' AND $data['activo'] == 1){ 
            //$this->view->generate('home_comerciante_view.php', 'template_view.php', $data);
            //header('Location: /item/listado_de_items');
            header('Location: /pedidos/al_comercio');

        }

        elseif($data['rol'] == 'Repartidor' AND $data['activo'] == 1){ 
            //$this->view->generate('home_repartidor_view.php', 'template_view.php', $data);
            header('Location: /pedidos/pendientes');
        }

        elseif($data['rol'] == 'Cliente' AND $data['activo'] == 1){ 
            //$this->view->generate('home_cliente_view.php', 'template_view.php', $data);
            header('Location: /comercios/listadoComercios');
        }

        else{
            $data['mje']='Cuenta sin acceso';            
            $this->view->generate('main_view.php', 'template_view.php', $data);
        }
        
    }


    function logout(){

            $this->model->logout();
            header('Location: /');

    }

}

?>
