<?php 
//refresca cada 5 segundos solo esta pagina
header("Refresh: 5");
?>
<?php #echo "<br><br><pre>";	print_r($data);  echo"</pre>";  ?>
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

							<li class="nav-item nav-link mx-2 border border-warning active"> <a class="nav-link navbar-brand mr-0 text-light" href="/pedidos/al_comercio">
									<b> PEDIDOS</b></a> 
							</li>

							<li class="nav-item nav-link  mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/item/listado_de_items">
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
			
			<div class="row">
				<div class="col-md-12 p-3 ">
					<?php

					//print_r($data);echo "<br><br>";

					if(isset($data)){

						echo "
							<table class='table table-striped'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Estado</th>
							      <th scope='col'>Hora Entrada</th>
							      <th scope='col'>Hora Listo</th>
							      <th scope='col'>Hora Despachado</th>
							      <th scope='col'>Monto</th>
							      <th scope='col'></th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data as $id => $rows ) {
						   echo "<tr>
						      <th scope='row'><a href='/pedidos/ver_items?id=$id'>$id</a></th>
						      <td>$rows[estado]</td>
						      <td>$rows[hora_inicio]</td>
						      <td>$rows[hora_listo]</td>
						      <td>$rows[hora_despachado]</td>
						      <td>$rows[monto]</td>";

						if($rows['estado']=='Elaborandose'){
						    echo"<td>
						    <a href='/pedidos/pedidoListo?id=$id' class='btn btn-warning btn-group-lg'>Listo</a>";
						    echo"</td>";
						}
						if($rows['estado']=='Pendiente'){
						    echo"<td>
						    <a href='/pedidos/despacharPedido?id=$id' class='btn btn-group-lg btn-info disabled' />Despachar</a>";
						    echo"</td>";
						}
						if($rows['estado']=='Asignado'){
						    echo"<td>
						    <a href='/pedidos/despacharPedido?id=$id' class='btn btn-group-lg btn-info' />Despachar</a>";
						    echo"</td>";
						}
						if($rows['estado']=='Despachado'){
						    echo"<td>
						    <a href='#' class='btn btn-group-lg btn-success' />Despachado</a>";
						    echo"</td>";
						}
						if($rows['estado']=='Entregado'){
						    echo"<td>
						    <a href='#' class='btn btn-group-lg btn-success disabled' />Entregado</a>";
						    echo"</td>";
						}
						"</tr>";
						};
						echo "
							  </tbody>
							</table>
						";
					}
					else echo"<div class='p-3 mb-2 bg-dark text-white'><h3>No hay pedidos pendientes por el momento</h3> <a href='/pedidos/al_comercio'>Recargar ⟳</a></div>";
					?>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
