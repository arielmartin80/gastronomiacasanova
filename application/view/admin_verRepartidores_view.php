<?php #echo"<br><br><pre>";print_r($data);echo"</pre>"; ?>

<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">

	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-10 p-4">

				<div class="row">
					<div class="col-12 text-light">
						<h1>Repartidores</h1><br>
					</div>
				</div>

			<nav class="navbar navbar-expand-md navbar-light nav nav-pills nav-fill">
					<div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
							<ul class="navbar-nav">

								<li class="nav-item nav-link mx-2 border border-warning "> <a class="nav-link navbar-brand mr-0 text-warning" href="/usuario/listado">
									<b> USUARIOS</b></a>
								</li>

								<li class="nav-item nav-link  mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/verComercios">
									<b> COMERCIOS</b></a>
								</li>
																</li>
								<li class="nav-item nav-link active mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-light" href="/liquidacion/verComercios">
									<b> REPARTIDORES</b></a>
								</li>

							</ul>
						</div>
					</div>
				</nav>


				<div class="row">
					<div class="col-md-12 p-3">

						<?php

					if(isset($data)){
						echo "
							<table class='table table-striped'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Nombre</th>
							      <th scope='col'>Categoria</th>
							      <th scope='col'>Direccion</th>
							      <th scope='col'></th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ($data as $id => $comercio) {
				        
					echo "<tr>
							<th scope='row'>$id</th>
							<td> $comercio[nombre] </td>
							<td>$comercio[apellido]</td>
							<td>$comercio[direccion]</td>
							<td>
								<a type='button' href='/liquidacion/verLiquidaciones?id_repartidor=$id'  class='btn btn-success btn-lg'>
							      		Liquidaciones
							    </a>
							</td>";
							echo"</tr>";
						}

						echo "
							  </tbody>
							</table>
						";


					}

					else 

						echo "LIQUIDACION NO REALIZADA";

					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
