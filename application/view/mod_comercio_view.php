
<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
    
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 p-4" style="">

      <div class="row">
          <div class="col-12 text-light">
               <h1>Comercio</h1><br>
          </div>
      </div>

          <nav class="navbar navbar-expand-md navbar-light nav nav-pills nav-fill">
            <div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
                <ul class="navbar-nav">
                  <li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/pedidos/al_comercio">
                      <b> PEDIDOS</b></a> 
                  </li>
                  <li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/item/listado_de_items">
                      <b> ITEMS</b></a> 
                  </li>
                  <li class="nav-item nav-link mx-2 border border-warning active"> <a class="nav-link navbar-brand mr-0 text-light" href="/comercios/mod_comercio">
                      <b> COMERCIO</b></a> 
                  </li>
                  <li class="nav-item nav-link  mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/liquidacionesComercio">
                    <b> LIQUIDACIONES</b></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          
          <br>
          <form action="/comercios/update_comercio" method="post" enctype="multipart/form-data">

            <input type="hidden" id="id" name="id" value="<?php echo $data['id']?>">

            <h5>Razon Social</h5>
            <input type="text" id="razonSocial" name="razonSocial" class="form-control m-0 mx-auto w-50" placeholder="Ingrese nombre del comercio" value="<?php echo $data['razonSocial']?>" style="box-shadow: black 0px 0px 4px;"/><br>

            <h5>Direccion del Punto de Venta</h5>
            <input type="text" name="puntoDeVenta" class="form-control m-0 mx-auto w-50" id="autocomplete" placeholder="Ingrese la dirección del comercio" onFocus="geolocate()" value="<?php echo $data['puntoDeVenta']?>" style="box-shadow: black 0px 0px 4px;"/><br>
            
            <h5>Tiempo en el que se entregan los pedidos</h5>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="tiempo estimado en minutos (5-59)" min="5" max="59" value="<?php echo $data['tiempo_estimado']?>"/>
            <br>

            <h5>Categoria</h5>
            <input type="text" id="categoria" name="categoria" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="categoria de su negocio" value="<?php echo $data['categoria']?>"/>
            <br>

            <h5>Zona de Cobertura</h5>
            <input type="text" id="zonaCobertura" name="zonaCobertura" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese una zona de cobertura" value="<?php echo $data['zonaCobertura']?>"/>
            <br>

            <h5>Telefono del local</h5>
            <input type="text" id="tel" name="tel" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese un telefono" value="<?php echo $data['tel']?>"/>
            <br>

            <h5>Email del comercio</h5>
            <input type="email" id="mailto" name="mailto" class="form-control m-0 mx-auto w-50" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese un email" value="<?php echo $data['mailto']?>"/>
            <br>

    <h5>Logo de su Comercio</h5>
            <output id='out-logo' style="width:15em;"><img class="thumb img-fluid" src="/application/resources/img/comercios/<?php echo $data['id']?>.jpg"></output>

            <br><br>

            <div class="botonInputFileModificado">
              <input type="file" id="in-logo" name="files1" class="m-0 mx-auto w-50 form-control-file bg-danger inputImagenOculto img-fluid" />
              <div class="boton">Cambiar imagen</div> 
            </div>

            <br><br>

    <h5>Banner de su Comercio</h5>
            <output id='out-banner' style=""><img class="thumb img-fluid" src="/application/resources/img/banners/<?php echo $data['id']?>.jpg"></output>

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


            <button type="submit" class="btn btn-secondary w-25" style="box-shadow: 0px 0px 4px  black;">
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


    
    