<div class="py-5 text-center text-md-right"  style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
  <div class="py-5">
    <div class="container">
        <div class="row">
          <ul class="nav nav-pills py-5 ">
            <li class="nav-item"> <a href="#" class="nav-link active">Listado de comercio</a> </li>
            <li class="nav-item" > <a class="nav-link" href="/pedidos/al_cliente"><i class="fa fa-lg fa-child"></i> Pedidos confirmados</a> </li>
            <!--li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-lg fa-anchor mt-1"></i>Estados pedidos</a> </li-->
          </ul>  
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="row justify-content-center">
                     
                          <?php
                          if(isset($data)){
                            foreach ($data as $id => $item) {

                              $razonSocial = $data[$id]['razonSocial'];
                              $puntoDeVenta = $data[$id]['puntoDeVenta'];
                              $categoria = $data[$id]['categoria'];
                              $zonaCobertura = $data[$id]['zonaCobertura'];

                              echo"
                                <div class='col-lg-6 col-md-6 p-3 bg-light'>
                                  <div class='row'>
                                    <div class='col-5 p-0'> 
                                      <img class='img-fluid d-block border-warning rounded' src='/application/resources/img/comercios/$id.jpg'>
                                    </div>
                                    <div class='col-7'>
                                      <p class='lead mb-1'> <b>$razonSocial</b> </p>
                                      <p class='mb-0'>$categoria</p>
                                      <p class='mb-0''>$puntoDeVenta</p>
                                      <div class='p-3'>
                                        <a type='button' href='/pedidos/listadoProductos?idComercio=$id' class='btn btn-info btn-lg'>Ver Menú</a>
                                      </div>  
                                    </div>
                                  </div>
                                </div>";
                            } 
                          }
                         ?>
              </div>
            </div>
          </div>

          
      
    </div>
  </div>
  
</div>

