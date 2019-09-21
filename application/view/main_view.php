
  <div class="align-items-center d-flex cover section-aquamarine py-5" style="	background-image: url(/application/resources/img/fondo.jpg);	background-position: top left;	background-size: 100%;	background-repeat: repeat;">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 align-self-center text-lg-left text-center">
          <div class="tituloHome">
          <h1 class="mb-0 mt-5 display-4"><?php echo WEBNAME ?></h1>
          </div>
          <p class="mb-5"></p>
        </div>
        <div class="col-lg-5 p-3">
          <form class="p-4 bg-light rounded" action="/login/comprobarUsuario" method="POST" enctype="application/x-www-form-urlencoded">

            <h4 class="mb-4 text-center">Iniciar sesion</h4>

            <div class="form-group"> 
              <label>Usuario</label>
              <input  type="text" class="form-control" name="email" placeholder="Ingrese usuario" >

              <select name="email">
                <option value="reyna@gmail.com">Cliente Dummy</option>
                <option value="ariel@gmail.com">Comeriante1 Dummy</option>
                <option value="tomas@gmail.com">Comeriante2 Dummy</option>
                <option value="diego@gmail.com">Repartidor Dummy</option>
                <option value="admin">Administrador</option>
              </select>

            </div>

            <div class="form-group"> <label>Contraseña</label>
              <input  type="password" class="form-control" name="clave" placeholder="Ingrese contraseña 1234"> </div>

              <?php if(isset($data['mje'])) echo "<p style=color:red;'>" . $data['mje'] . "</p>"?>

            <button type="submit" class="btn mt-4 btn-block p-2 btn-success"><b>INICIAR SESION</b></button>

             <br><a href="/usuario/alta_usuario" ><p class="text-center">Registrarse</p></a>

          </form>

         

        </div>
      </div>
    </div>
    
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js" style=""></script>






