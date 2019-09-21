<script type="text/javascript">
  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avat').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>
<style type="text/css">
  .avat{
    height: 200px;
    width: 200px;
    border-radius: 50%;
    border: 5px solid white;
  }
</style>
<div class="align-items-center d-flex cover section-aquamarine py-5" style="  background-image: url(/application/resources/img/fondo.jpg);  background-position: top left;  background-size: 100%;  background-repeat: repeat;">
    
  <div class="container">

  <div class="row">
      <div class="col-sm-12"><h1>Usuario <?php echo $data['nombre'];?></h1></div>
  </div>
  <form class="form" action="/usuario/update_user" method="post"  enctype="multipart/form-data" id="registrationForm">
    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $data['id_usuario'];?>">
    <div class="row">
    
      <div class="col-sm-3"><!--left col-->

        <div class="text-center">
          <img src="/application/resources/img/usuarios//<?php echo$data['id_usuario'];?>.jpg" class="avat img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input type="file" class="text-center center-block file-upload">
        </div>

      </hr><br>

      </div><!--/col-3-->
      <div class="clearfix visible-xs"></div>
      <div class="col-sm-5">
                      <div class="form-group">
                          <div class="">
                              <label for="nombre"><h4>Nombre</h4></label>
                              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="<?php echo $data['nombre'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="">
                            <label for="apellido"><h4>Apellido</h4></label>
                              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido" value="<?php echo $data['apellido'];?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="">
                              <label for="dni"><h4>DNI</h4></label>
                              <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese su DNI" value="<?php echo $data['dni'];?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="">
                             <label for="cuil"><h4>CUIL</h4></label>
                              <input type="text" class="form-control" name="cuil" id="cuil" placeholder="Ingrese su CUIL" value="<?php echo $data['cuil'];?>">
                          </div>
                      </div>
                      
      </div>     
        <div class="col-sm-4">
                      <div class="form-group">
                          
                          <div class="">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="tu_email@email.com" value="<?php echo $data['email'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="">
                              <label for="direccion"><h4>direccion</h4></label>
                              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="ingrese su direccion" value="<?php echo $data['direccion'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="">
                                <br>
                                <button type="submit" class="btn btn-primary w-25" style="box-shadow: 0px 0px 4px  black;"> GUARDAR </button>
                                <a  href="javascript:window.history.go(-1);" type="button" class="btn btn-sm "><i class="fa fa-rotate-left" aria-hidden="true"></i>Volver</i></a>
                            </div>
                      </div>          
        </div>
      
    </div><!--/row-->
  </form>
  </div>
</div>
