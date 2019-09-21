<?php	#echo "<br><br><pre>";	print_r($data);  echo"</pre>";  ?>

<div class="py-5 text-center text-md-right" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
    <div class="py-5">
    	<div class="container">
        	<div class="row">
          		<ul class="nav nav-pills py-5 ">
		            <li class="nav-item"> <a href="/comercios/listadoComercios" class="nav-link ">Listado de comercio</a> </li>
		            <li class="nav-item" > <a class="nav-link active" href="/pedidos/al_cliente"><i class="fa fa-lg fa-child"></i> Pedidos confirmados y estado</a> </li>
		            <!--li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-lg fa-anchor mt-1"></i>Estados pedidos</a> </li-->
          		</ul>
          	</div>  
			<div class="row">
              	<div class="col-md-12">
                
                    <div class="row justify-content-center" style="color: white">
                     
                        
                        <?php

					//print_r($data);echo "<br><br>";

					if(isset($data)){

						echo "
							<div class='table-responsive text-nowrap'>
							<table class='table'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Estado</th>
							      <th scope='col'>Hora Entrada</th>
							      <th scope='col'>Hora Despachado</th>
							      <th scope='col'>Hora Entregado</th>
							      <th scope='col'>Monto</th>
							      <th scope='col'></th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data as $id => $rows ) {
						   echo "<tr>
						      <th scope='row'>$id</th>
						      <td>$rows[estado]</td>
						      <td>$rows[hora_inicio]</td>
						      <td>$rows[hora_despachado]</td>
						      <td>$rows[hora_finalizacion]</td>
						      <td>$rows[monto]</td>";

						if($rows['estado']=='Elaborandose'){
						    echo"<td>
						    <a href='#' class='btn btn-warning btn-group-lg disabled'>Elaborandose</a>";
						    echo"</td>";
						}
						if($rows['estado']=='Pendiente'){
						    echo"<td>
						    <a href='#' class='btn btn-group-lg btn-info disabled' />Pendiente</a>";
						    echo"</td>";
						}

						if($rows['estado']=='Asignado'){
						    echo"<td>
						    <a href='#' class='btn btn-group-lg btn-info disabled' />Asignado</a>";
						    echo"</td>";
						}

						if($rows['estado']=='Despachado'){
						    echo"<td>
						     <a href='/pedidos/pedidoListoCliente?id=$id' class='btn btn-warning btn-group-lg disabled'>Listo</a>";
						    echo"</td>";
						}


						if($rows['estado']=='Entregado'){
						    echo"<td>
						    <a href='#' class='btn btn-group-lg btn-success disabled' />Recibido</a>";
						    echo"</td>";
						}
						if($rows['estado']=='Recibido'){
						    echo"<td>
						     <a href='#' class='btn  btn-success disabled'>Recibido</a>";
						    echo"</td>";
						}
						    
						echo"</tr>";
						
						};

						echo "
							  </tbody>
							</table>
						</div>
						";


					}

					else echo"<div class='p-3 mb-2 bg-dark text-white'><h3>No hay pedidos pendientes por el momento</h3></div>";

					?>

                	</div>
            	</div>
            </div>


        </div>
    </div>
  
</div>

