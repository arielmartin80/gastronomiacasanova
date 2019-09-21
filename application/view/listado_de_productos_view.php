<style type="text/css">
   
    .img-modal {
        width: 250px;
        height: 250px;

</style>
<div class="py-5 text-center text-white" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
  <div class="py-3 w-100 h-100" style="">
    <div class="container w-100 h-100 mt-0">
      <div class="row">
        <div class="col-md-12 text-dark text-center ">
          <h2 class="text-warning">Listado de productos</h2><br>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php

        // Banner

        if(isset($_GET['idComercio'])){
           echo" <div class=' col-md-12 col-sm-10 p-3 bg-light border-warning border'>
            <img class='img-fluid d-block border-warning rounded mx-auto' src='/application/resources/img/banners/" . $_GET['idComercio'] . ".jpg'>
          </div>";

        }
         

          if(!isset($data)){
            
            echo" <div class=' col-md-12 col-sm-10 p-3 bg-light border-warning border'>
                    <h3>Este comercio aun no tiene productos disponibles a la venta.</h3>
                  </div>
                </div>";

            echo "<div class='row'>
                    <div class='mt-4 p-2 col-md-6 col-sm-4 p-3'>
                      <form class=''>
                        <a href='/comercios/listadoComercios' class='btn btn-block btn-warning'><i class='fa fa-angle-left'></i> Volver</a>
                      </form>
                    </div>
                  </div>";

          } else {
            foreach ($data as $id => $item) {

              $nombre = $data[$id]['nombre'];
              $descripcion = $data[$id]['descripcion'];
              $precio = $data[$id]['precio'];
              $idComercio = $data[$id]['id_comercio'];
            
              echo"
                     
              
              
                <div class=' col-md-12 col-sm-10 p-3 bg-light border-warning border'>
                  <div class='row'>
                    <div class='col-2 p-0'> <img class='img-fluid d-block border-warning rounded' 
                    src='/application/resources/img/items/$id.jpg'> </div>
                    <div class='col-9'>
                      <p class='lead mb-1'> <b>$nombre</b> </p>
                      <p class='mb-0'>$descripcion</p>
                      <p class='mb-0'>$$precio</p><br>
                       
                        
                       <button type='button' class='btn btn-danger fa fa-plus rounded-circle' data-toggle='modal' data-target='#modal$id'></button> 
                    </div>

                </div>
                 
                </div>

                <form action='/pedidos/listadoProductos?idComercio=$idComercio' method='post' enctype='multipart/form-data'>
                  
                  <div id='modal$id' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        </div>
                        <div class='modal-body'>
                        <input type='hidden' name='idItem' value='$id'> 
                        
                          <img  class='img-fluid img-modal' src='/application/resources/img/items/$id.jpg'>
                        
                        <br>

                        <h1>$nombre</h1>
                        <p>$descripcion</p>
                        <p>Precio: $$precio</p>
                        <p>Cantidad: <select name='cantidad'>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                          </select>
                        </p>

                        </div>
                        <div class='modal-footer'>
                          <input type='submit' class='btn btn-success' value='Agregar'/>
                          <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>";
            }

            echo "</div>
            <div class='row'>
                    <div class='mt-4 p-2 col-md-6 col-sm-4 p-3'>
                      <form class=''>
                        <a href='/comercios/listadoComercios' class='btn btn-block btn-warning'><i class='fa fa-angle-left'></i> Volver</a>
                      </form>
                    </div>
                    <div class='mt-4 p-2 col-md-6 col-sm-4 p-3'>";

                      if(isset($_SESSION['carrito']) ){
                          echo "
                                  <form class='' action='/pedidos/verCompra' method='post' enctype='multipart/form-data'>
                                    <button type='submit' class='btn btn-block btn-success'>Verificar Compra</button>
                                  </form>";
                      }

            echo "
                  </div>
            </div>
            ";

          }
        ?>
         
      </div>
    </div>
  </div>
</div>
  
  
  
  
  
  

