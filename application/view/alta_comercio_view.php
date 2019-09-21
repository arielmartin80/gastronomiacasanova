
  <div class="py-5 text-center text-white" style="	background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(/application/resources/img/fondoItem.jpg);	background-position: center center, center center;	background-size: cover, cover;	background-repeat: repeat, repeat;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 p-4" style="">
          <h1 class="text-light">Datos del Comercio<br></h1>
          
          <form action="/comercios/guardar_comercio" method="post" enctype="multipart/form-data">

            <h5>Razon Social</h5>
            <input type="text" id="razonSocial" name="razonSocial" class="form-control m-0 mx-auto w-50" placeholder="Ingrese nombre del comercio" style="box-shadow: black 0px 0px 4px;"/><br>

            <h5>Direccion del Punto de Venta</h5>
            <input type="text" name="puntoDeVenta" class="form-control m-0 mx-auto w-50" id="autocomplete" placeholder="Ingrese la dirección del comercio" onFocus="geolocate()" style="box-shadow: black 0px 0px 4px;"/><br>
            
            <h5>Tiempo en el que se entregan los pedidos</h5>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="tiempo estimado en minutos (5-59)" min="5" max="59"/>
            <br>

            <h5>Categoria</h5>
            <input type="text" id="categoria" name="categoria" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="categoria de su negocio"/>
            <br>

            <h5>Zona de Cobertura</h5>
            <input type="text" id="zonaCobertura" name="zonaCobertura" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese una zona de cobertura"/>
            <br>

            <h5>Telefono del local</h5>
            <input type="text" id="tel" name="tel" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese un telefono"/>
            <br>

            <h5>Email del comercio</h5>
            <input type="email" id="mailto" name="mailto" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese un email"/>
            <br>

    <h5>Logo de su Comercio</h5>
            <output id='out-logo' style="width:20em;"><img class="thumb img-fluid" src="/application/resources/img/comercios/0.png"></output>

            <br><br>

            <div class="botonInputFileModificado">
              <input type="file" id="in-logo" name="files1" class="m-0 mx-auto w-50 form-control-file bg-danger inputImagenOculto img-fluid" />
              <div class="boton">Cambiar imagen</div> 
            </div>

            <br><br>

    <h5>Banner de su Comercio</h5>
            <output id='out-banner' style=""><img class="thumb img-fluid" src="/application/resources/img/comercios/0.png"></output>

            <br><br>

            <div class="botonInputFileModificado">
              <input type="file" id="in-banner" name="files2" class="m-0 mx-auto w-50 form-control-file bg-danger inputImagenOculto img-fluid" />
              <div class="boton">Cambiar imagen</div> 
            </div>

            <br><br>

            
    <script> // js para mostrar la imagen 1
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
                          // Insertamos la imagen en el output
                         document.getElementById("out-logo").innerHTML = ['<img class="thumb img-fluid" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             //obtenemos la imagen del id
              document.getElementById('in-logo').addEventListener('change', archivo, false);     
            </script>



    <script> // js para mostrar la imagen 2
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
                          // Insertamos la imagen en el output
                         document.getElementById("out-banner").innerHTML = ['<img class="thumb img-fluid" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
              //obtenemos la imagen del id
              document.getElementById('in-banner').addEventListener('change', archivo, false);     
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


    
    