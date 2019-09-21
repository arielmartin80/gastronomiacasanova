<?php 
//refresca cada 5 segundos solo esta pagina
header("Refresh: 5");
?>

<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
	
	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-10 p-4">

				<div class="row">
					<div class="col-12 text-light">
						<h1>Pedidos Pendientes</h1><br>
					</div>
				</div>

			<nav class="navbar navbar-expand-md navbar-light nav nav-pills nav-fill">
					<div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
							<ul class="navbar-nav">

								<li class="nav-item nav-link mx-2 border border-warning active"> <a class="nav-link navbar-brand mr-0 text-light" href="/pedidos/pendientes">
										<b> PEDIDOS</b></a> 
								</li>

				                <li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/liquidacionesRepartidor">
				                  		<b> LIQUIDACIONES</b></a>
				                </li>

							</ul>
						</div>
					</div>
				</nav>

	        <div class="row">
				<div class="col-md-12 p-3">
					<?php

					//print_r($data);echo "<br><br>";

					if(isset($data)){

						echo "
							<table class='table table-striped'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Estado</th>
							      <th scope='col'>Hora</th>
							      <th scope='col'>Comercio</th>
							      <th scope='col'>Dirección del Comercio</th>
							      <th scope='col'>Dirección del Cliente</th>
							      <th scope='col'></th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data as $id => $rows ) {
						   echo "<tr>
						      <th scope='row'>$id</th>
						      <td>" . $rows['estado'] . "</td>
						      <td>" . $rows['hora_listo'] . "</td>
						      <td>" . $rows['razonSocial'] . "</td>
						      <td>" . $rows['puntoDeVenta'] . "</td>
						      <td>" . $rows['direccion'] . "</td>
						      <td><a type='button' href='/pedidos/asignado?id=$id' class='btn btn-info btn-lg'>Tomar Pedido</a></td>
						    </tr>";
						};

						echo "
							  </tbody>
							</table>
						";


					}

					else echo"<div class='p-3 mb-2 bg-dark text-white'><h3>No hay pedidos pendientes por el momento</h3> <a href='/pedidos/pendientes'>Recargar ⟳</a></div>";

					?>
				</div>

			</div>
		</div>
	</div>
</div>		

