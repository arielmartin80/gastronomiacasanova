
<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 p-4" style="">
          <h1 class="text-light">Agregar producto<br></h1>
          <form action="/item/upload_item" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6"> </div>
              <div class="form-group col-md-6"> </div>
            </div>
            <h5>Nombre</h5>
            <input type="text" id="nombre" name="nombre" class="form-control m-0 mx-auto w-50" id="form23" placeholder="Ingrese nombre de producto" style="box-shadow: black 0px 0px 4px;"><br>
            <h5>Descripcion</h5>
            <input type="text" id="ataque" name="descripcion" class="form-control m-0 mx-auto w-50" id="form23" placeholder="Ingrese descripcion del producto" style="box-shadow: black 0px 0px 4px;"><br>
            
            <h5>Precio</h5>
            <input type="text" id="precio" name="precio" class="form-control m-0 mx-auto w-50" id="form23" style="box-shadow: black 0px 0px 4px;" placeholder="ingrese precio del produto"><br><br>

            <h5>Foto del producto</h5>
            <output id='list' style="width:20em;"><img src="/application/resources/img/items/0.png" alt=""></output>
            
            <br><br>

            <div class="botonInputFileModificado">
              <input type="file" id="files" name="files" class="m-0 mx-auto w-50 form-control-file bg-danger inputImagenOculto" />
              <div class="boton">Cambiar imagen</div> 
            </div>
            
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

            <br><br>

            <button type="submit" class="btn btn-secondary w-25" style="	box-shadow: 0px 0px 4px  black;">GUARDAR</button>
          </form>
        </div>
      </div>
    </div>
  </div>


    
    