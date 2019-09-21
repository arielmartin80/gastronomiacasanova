<?php #echo"<br><br><pre>";print_r($data);echo"</pre>"; ?>

<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">

	<div class="container">
		<div class="row">
			<div class="mx-auto col-md-10 p-4">

				<div class="row">
					<div class="col-12 text-light">
						<h1>Usuarios</h1><br>
					</div>
				</div>

				<nav class="navbar navbar-expand-md navbar-light nav nav-pills nav-fill">
					<div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
							<ul class="navbar-nav">

								<li class="nav-item nav-link mx-2 border border-warning active"> <a class="nav-link navbar-brand mr-0 text-light" href="/usuario/listado">
									<b> USUARIOS</b></a>
								</li>

								<li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/verComercios">
									<b> COMERCIOS</b></a>
								</li>
																</li>
								<li class="nav-item nav-link mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-warning" href="/liquidacion/verRepartidores">
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
							      <th scope='col'>Rol</th>
							      <th scope='col'>Nombre</th>
							      <th scope='col'>Direccion</th>
							      <th scope='col'>Email / Usuario</th>
							      <th scope='col'>Usuario</th>
							      <th scope='col'>Comercio</th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data as $id => $rows ) {
					echo "<tr>
						      <th scope='row'>$id</th>
						      <td>" . $rows['rol'] . "</td>
						      <td>" . $rows['nombre']." ".$rows['apellido'] . "</td>
						      <td>" . $rows['direccion'] . "</td>
						      <td>" . $rows['email'] . "</td>";
						      

						 #columnaUsuario

						 echo"<td>";

						      if($rows['id_rol'] == '1'){
						      echo"<a type='button' href='#' class='btn btn-success btn-lg disabled'>
						      		Habilitado
						      	</a>";
						      }

						      if($rows['activo'] == 0){
						      echo"<a type='button' href='/usuario/habilitar_usuario?id=$id' class='btn btn-danger btn-lg'>
						      		Sin Acceso
						      	</a>";
						      }

						      if($rows['activo'] == 1 AND $id != 0){
						      echo"<a type='button' href='/usuario/deshabilitar_usuario?id=$id' class='btn btn-success btn-lg'>
						      		Habilitado
						      	</a>";
						      }
						 echo "</td>";

						 #columna Comercio
						 echo"<td>";

						 if($rows['id_comercio']){

						      if($rows['comercio_activo'] == 0){
						      echo"<a type='button' href='/comercios/habilitar_comercio?id=$rows[id_comercio]' class='btn btn-danger btn-lg'>
						      		X
						      	</a>";
						      }

						      if($rows['comercio_activo'] == 1){
						      echo"<a type='button' href='/comercios/deshabilitar_comercio?id=$rows[id_comercio]' class='btn btn-success btn-lg'>
						      		✓
						      	</a>";
						      }

						  }
						 echo "</td>";

						echo"</tr>";
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
</div>