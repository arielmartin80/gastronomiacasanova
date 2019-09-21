


<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
	
	<div class="py-5">
		<div class="container">
	      	<div class="row">
	        	<div class="col-12">
	        		<?php

	        			if(!$data){
							echo "<h2>Pedido entregado correctamente! :D</h2><br>
								<h2>Buen trabajo!!</h2>	<br><br>
								<a type='button' href='/pedidos/pendientes' class='btn btn-success btn-lg'>Ok</a>
								<br><br>";
						} else {
							echo "<h2>El pedido ha sido entregado con demora</h2><br>
								<h2>Se aplicará una penalización del 0,5% del valor del viaje</h2>	<br><br>
								<a type='button' href='/pedidos/pendientes' class='btn btn-success btn-lg'>Ok</a>
								<br><br>";
						}


					?>
	          	</div>
			
	        </div>
	        
		</div>
	</div>
</div>		
