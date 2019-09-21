
  <div class="py-5 text-center text-white" style="	background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(/application/resources/img/fondoItem.jpg);	background-position: center center, center center;	background-size: cover, cover;	background-repeat: repeat, repeat;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 p-4" style="">
          <h1 class="text-light">Datos del Usuario<br></h1>
          
          <form action="/usuario/activar_cuenta" method="post" enctype="multipart/form-data">

            <h4>Quieres registrarte como un:</h4>
            <input type="radio" id="rol" name="rol[id_rol]" value="4" checked="true" /> 
            <i class="" style="" >Cliente</i>
            <input type="radio" id="rol" name="rol[id_rol]" value="2"/>
            <i class="" style="" >Comerciante</i>
            <input type="radio" id="rol" name="rol[id_rol]" value="3"/>
            <i class="" style="" >Repartidor</i><br><br>

            <h5>Nombre</h5>
            <input type="text" id="nombre" name="nombre" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="Ingrese su nombre" required />
            <br>

            <h5>Apellido</h5>
            <input type="text" id="apellido" name="apellido" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="Ingrese su apellido" />
            <br>

            <h5>Direccion</h5>
            <input type="text" name="direccion" class="form-control m-0 mx-auto w-50" id="autocomplete" placeholder="Ingrese su dirección" onFocus="geolocate()" /><br>
            
            <h5>DNI</h5>
            <input type="text" id="dni" name="dni" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese su dni" pattern="[0-9]{8}" title="28555767" />
            <br>

            <h5>CUIL</h5>
            <input type="text" id="cuil" name="cuil" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese su CUIL" pattern="[0-9]{2}-[0-9]{8}-[0-9]{1}" title="10-28555767-4" />
            <br>

            <h5>Email</h5>
            <input type="email" id="email" name="email" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese un email" required />
            <br>

            <h5>Contraseña</h5>
            <input type="password" id="pass" name="pass" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="Ingrese una contraseña" required />
            <br>

            <h5>Repita Contraseña</h5>
            <input type="password" id="pass2" name="pass2" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="Repita su contraseña" required />
            <br>


            <h5>Foto de Perfil</h5>
            <output id='list' style="width:20em;">
              <img src="/application/resources/img/usuarios/0.jpg" alt="" style="width: 15em">
            </output>

            <br><br>

            <div class="botonInputFileModificado">
              <input type="file" id="files" name="files" class="m-0 mx-auto w-50 form-control-file bg-danger inputImagenOculto" placeholder="" style="box-shadow: black 0px 0px 4px;"/>
              <div class="boton">Cambiar imagen</div> 
            </div>
            <br><br>
            
            <script> // js para mostrar la imagen en pantalla
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb img-fluid" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);		  
		        </script>

            <button type="submit" class="btn btn-primary w-25" style="box-shadow: 0px 0px 4px  black;">
              GUARDAR
            </button>

          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvZj61EiOcl1RlGGo3dt9u2OpyqqYkohk&v=3.exp&signed_in=true&libraries=places">
  </script>
  <script src="/application/resources/js/autocompletar_direccion.js"> </script>


    
    