   <?php //echo"<br><br><pre>";print_r($data);echo"</pre>"; ?>
<style type="text/css">
  .user-row {
    margin-bottom: 14px;
  }

  .user-row:last-child {
      margin-bottom: 0;
  }

  .dropdown-user {
      margin: 13px 0;
      padding: 5px;
      height: 100%;
  }

  .dropdown-user:hover {
      cursor: pointer;
  }

  .table-user-information > tbody > tr {
      border-top: 1px solid rgb(221, 221, 221);
  }

  .table-user-information > tbody > tr:first-child {
      border-top: 0;
  }


  .table-user-information > tbody > tr > td {
      border-top: 0;
  }
  .toppad{
    margin-top:20px;
  }
.profile-card {
  background: #FFB300;
  width: 56px;
  height: 56px;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 2;
  overflow: hidden;
  opacity: 0;
  margin-top: 70px;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-border-radius: 50%;
  border-radius: 50%;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
  animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards, 
             moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards, 
             moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards, 
             materia 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
}


@keyframes init {
  0% {
    width: 0px;
    height: 0px;
  }
  100% {
    width: 56px;
    height: 56px;
    margin-top: 0px;
    opacity: 1;
  }
}

@keyframes moveDown {
  0% {
    top: 50%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 100%;
  }
}

@keyframes moveUp {
  0% {
    background: #FFB300;
    top: 100%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 50%;
    background: #E0E0E0;
  }
}

@keyframes materia {
  0% {
    background: #E0E0E0;
  }
  50% {
    border-radius: 4px;
  }
  100% {
    width: 50%;
    height: 60%;
    background: #FFFFFF;
    border-radius: 4px;
  }
}

    
</style>
  <div class="align-items-center d-flex cover section-aquamarine py-5" style="  background-image: url(/application/resources/img/fondo.jpg);  background-position: top left;  background-size: 100%;  background-repeat: repeat;">
    
  <div class="container">
      <div class="row pt-5" >
        <aside class="profile-card">
        <div class=" mx-auto col-12 p-3 section-light col-lg-12">

          <div class="card ">
            <div class="card-header">
              <h1> Bienvenido <?php echo $data['nombre'];?> </h1>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="/application/resources/img/usuarios/<?php echo$data['id_usuario'];?>.jpg" class="img-fluid d-block rounded-circle"> </div>
              
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ROL:</td>
                        <td><?php echo $data['rol'];?></td>
                      </tr>
                      <tr>
                        <td>DNI:</td>
                        <td><?php echo $data['dni'];?></td>
                      </tr>
                      <tr>
                        <td>NOMBRE:</td>
                        <td><?php echo $data['nombre'];?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>APELLIDO:</td>
                        <td><?php echo $data['apellido'];?></td>
                      </tr>
                        <tr>
                        <td>DIRECCION:</td>
                        <td><?php echo $data['direccion'];?></td>
                      </tr>
                      <tr>
                        <td>CUIL:</td>
                        <td> <?php echo $data['cuil'];?></td>
                      </tr>
                        <td>EMAIL:</td>
                        <td> <?php echo $data['email'];?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                 
                </div>
              </div>
            </div>
                 <div class="card-footer text-muted">
                        <a data-original-title="Broadcast Message" href="javascript:window.history.go(-1);" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="fa fa-rotate-left" aria-hidden="true"></i> Volver</i></a>
                        <span class="pull-right">
                            <a href="/usuario/actualizar_perfil" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">Editar  <i class="fa fa-edit" aria-hidden="true"></i></a>
                            <!--a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a-->
                        </span>
                    </div>
            
          </div>
        </div>
      </aside>
      </div>


  </div>
</div>
