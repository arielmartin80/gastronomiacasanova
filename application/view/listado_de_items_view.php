<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">

	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-10 p-4">

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

								<li class="nav-item nav-link active mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-light" href="/item/listado_de_items">
										<b> ITEMS</b></a>
                </li>

								<li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/comercios/mod_comercio">
										<b> COMERCIO</b></a>
								</li>

                <li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/liquidacionesComercio">
                    <b> LIQUIDACIONES</b></a>
                </li>

							</ul>
						</div>
					</div>
				</nav>

				<br>
				<div class="row justify-content-center">
					<?php

          if(isset($data)){

//        se muestra el array de items del comercio
          foreach ($data as $id => $item) {

            $nombre = $data[$id]['nombre'];
            $descripcion = $data[$id]['descripcion'];
            $precio = $data[$id]['precio'];
            
            /*
            echo"Id: ".$id."<br>";
            echo"Nombre: ".$nombre."<br>";
            echo"Descripcion: ".$descripcion."<br>";
            echo"Precio: ".$precio."<br>";
            
      		  echo"<img class='img' src='/application/resources/img/items/$id.jpg' >"."<br>"; 
             */ 
            echo"
             
                <div class='col-lg-10 col-md-10 col-sm-10 p-3 bg-light border-warning border'>
                  <div class='row'>
                    <div class='col-2 p-0'> <img class='img-fluid d-block border-warning rounded' 
                    src='/application/resources/img/items/$id.jpg'> </div>
                    <div class='col-9'>
                      <p class='lead mb-1'> <b>$nombre</b> </p>
                      <p class='mb-0'>$descripcion</p>
                      <p class='mb-0'>$$precio</p>
                       
                       
                       
                       <div class='row'>
                      <div class='col-md-12 '><br>
                        <div class='row'>
                          <div class='col-sm-10 col-md-6'><a class='btn btn-sm btn-light' href='/item/baja_item?id=$id'><i class='fa fa-1x py-1 fa-times fa-fw lead d-inline text-danger'></i></a></div> 
                          
                          <div class='col-sm-10 col-md-6'><a class='btn btn-sm btn-light' href='/item/mod_item?id=$id'><i class='fa fa-fw fa-1x py-1 lead fa-pencil-square-o d-inline text-success'></i></a></div>
                        </div>
                      </div>
                    </div>
                        
                       
                    </div>

                </div>
                 
                </div>
            
              ";
            }      

        }

          else echo"<div class='p-3 mb-2 bg-dark text-white'><h3>No tienes productos a la venta por el momento</h3></div>";


        ?>

					<div class="col-md-10 text-right botonAgregar">
						<a class="btn btn-secondary btn-lg" href="/item/alta_item"><i class="fa fa-plus fa-fw fa-1x py-1 text-light"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

