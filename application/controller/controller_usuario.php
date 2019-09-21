<?php
class Controller_Usuario extends Controller{

    function perfil(){

        $data = $this->model->getUsuarioById(@$_SESSION['user']['id_usuario']);
            
        $this->view->generate('perfil_view.php', 'template_view.php', $data);

    }

    function actualizar_perfil(){

        $data = $this->model->getUsuarioById(@$_SESSION['user']['id_usuario']);
            
        $this->view->generate('perfil_actualizar_view.php', 'template_view.php', $data);

    }

    function update_user(){

        $data = $_POST;
        print_r($data);
        //$foto['files'] = $_FILES['files1'];

        $this->model->update_user($data);
        //$_SESSION['usuario'] = $this->model->getUsuarioById($data['id_usuario']);

        header("Location: /usuario/perfil");

    }

    function alta_usuario(){
            
        $this->view->generate('alta_usuario_view.php', 'template_view.php');

    }

    Function activar_cuenta(){

        $data = $_POST;
        $files = $_FILES;

        if($data['rol']['id_rol'] == 4){

            $this->activar_cliente($data, $files);

        }

        if($data['rol']['id_rol'] == 2){

            $_SESSION['new_user'] = $this->model->saveUsuario($data, $files);
 
            $this->view->generate('alta_comercio_view.php', 'template_view.php');
   
        }

        if($data['rol']['id_rol'] == 3){

            $this->activar_repartidor($data, $files);

            
        }

        //$this->view->generate('pendiente_aprobacion.php', 'template_view.php');

    }

    Function activar_cliente($data, $files){

        $this->model->saveUsuario($data, $_FILES);
        $data['mje']='Cuenta creada, puedes loguearte';
                    
        $this->view->generate('main_view.php', 'template_view.php', $data);

    }

    Function activar_comerciante(){

        $id_comercio = $_GET['id_comercio'];

        $this->model->asignar_comercio( @$_SESSION['new_user'], $id_comercio);

        $data['mje']='Cuenta creada, pendiente aprobacion';            
        $this->view->generate('main_view.php', 'template_view.php', $data);

    }

    Function activar_repartidor($data, $files){

        $this->model->saveUsuario($data, $_FILES);
        $data['mje']='Cuenta creada, pendiente aprobacion';

        $this->view->generate('main_view.php', 'template_view.php', $data);

    }


    function listado(){

        $data = $this->model->getAllUsuarios();

        $this->view->generate('listado_de_usuarios_view.php', 'template_view.php', $data);

    }

    Function habilitar_usuario(){

        $id = $_GET['id'];
        $this->model->habilitar_usuario($id);

        header('Location: listado');

    } 

    Function deshabilitar_usuario(){

        $id = $_GET['id'];
        $this->model->deshabilitar_usuario($id);

        header('Location: listado');

    }

}

?>