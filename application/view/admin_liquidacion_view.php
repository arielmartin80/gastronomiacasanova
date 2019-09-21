<?php #echo"<br><br><pre>";print_r($data);echo"</pre>"; ?>

<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">

	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-10 p-4">

				<div class="row">
					<div class="col-12 text-light">
						<h1>Liquidaciones</h1><br>
					</div>
				</div>

			<nav class="navbar navbar-expand-md navbar-light nav nav-pills nav-fill">
					<div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
							<ul class="navbar-nav">

								<li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/usuario/listado">
									<b> USUARIOS</b></a>
								</li>

								<li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/verComercios">
									<b> COMERCIOS</b></a>
								</li>
																</li>
								<li class="nav-item nav-link  mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/verRepartidores">
									<b> REPARTIDORES</b></a>
								</li>

							</ul>
						</div>
					</div>
				</nav>


				<div class="row">
					<div class="col-md-12 p-3">
						<div>

				<?php

					$id_comercio = @$_GET['id_comercio'];
					$id_repartidor = @$_GET['id_repartidor'];
					echo"<a type='button' href='/liquidacion/importesSinLiquidar?id_comercio=$id_comercio&id_repartidor=$id_repartidor' 
						class='btn btn-success btn-lg'>
						Importes sin Liquidar
					</a>";
						
				?>
						<br><br>
						</div>
				<?php

					if(isset($data)){

						echo "
							<table class='table table-striped'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Fecha desde</th>
							      <th scope='col'>Fecha hasta</th>
							      <th scope='col'>Repartidor</th>
							      <th scope='col'>Sistema</th>
							      <th scope='col'>Comercio</th>
							       <th scope='col'></th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data as $id => $rows ) {
						   echo "<tr>
						      <th scope='row'>$id</th>
						      <td>$rows[fecha_desde]</td>
						      <td>$rows[fecha_hasta]</td>
						      <td>$ $rows[ganancia_repartidor]</td>
						      <td>$ $rows[ganancia_sistema]</td>
						      <td>$ $rows[ganancia_comercio]</td>
						      <td> <a class='' href='/liquidacion/verLiquidacionesXcomercio?id_liquidacion=$id'>
                    			<b> Detalle</b></a> </td>";

								"</tr>";
								};
						echo "
							  </tbody>
							</table>
						";
					}
					else echo"<div class='p-3 mb-2 bg-dark text-white centered'>
					<h3>No hay liquidaciones realizadas</h3></div>";
					
				?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
