<!--br><br><br>
Esta pantalla debe mostrar la direccion del cliente, un detalle del pedido y dos botones, uno para cancelar y otro para Finalizar la entrega.
<br><br-->

<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
	
	<div class="py-5">
		<div class="container">
	      	<div class="row">
	        	<div class="col-12 text-warning">
	          		<h1>Pedido despachado</h1>
	          		<hr class="mb-4">
	          	</div>
	        </div>
	        <div class="row">
				<div class="col-md-7 p-3">


					<?php


					if(isset($data)){
						//print_r($data);
						$dirCliente = $data['direccion'];
						$dirComercio = $data['puntoDeVenta'];
						echo "<input type='hidden' id='origen' name='origen' value='".$dirCliente."'>
							  <input type='hidden' id='destino' name='destino' value='".$dirComercio."'>
							 ";
						$id = $data['id'];
						echo "IDPedido: " . $id . "<br>" .
							 "estado: " . $data['estado'] . "<br>" .
							 "hora_asignado: " . $data['hora_asignado'] . "<br>" .
							 "hora_estimada: " . $data['hora_estimada'] . "<br>" .
							 "nombre: " . $data['nombre'] . "<br>" .
							 "apellido: " . $data['apellido'] . "<br><br>" .
							 "DIRECCION DEL CLIENTE: " . $data['direccion'] . "<br>" .
							 "DIRECCION DEL comercio: " . $data['puntoDeVenta'] . "<br>".
							 "<br><br><br>";
						
						echo "<a type='button' href='/pedidos/cancelar?id=$id' class='btn btn-danger btn-lg'>Cancelar Pedido</a>
							  <a type='button' href='/pedidos/finalizar?id=$id' class='btn btn-success btn-lg'>Finalizar Entrega</a>
							  <br><br><br>";

					}

					else echo "<div class='p-3 mb-2 bg-dark text-white'><h3>No hay un pedido asignado</h3> <a href='/pedidos/pendientes'>← volver</a></div>";

					?>
				</div>
				<div class="col-md-5 p-3">
					<div id="floating-panel">
					    <b style="color: black">Modo de viaje: </b>
					    <select id="mode">
					      <option value="DRIVING">En automóvil</option>
					      <option value="WALKING">A pie</option>
					      <option value="TRANSIT">Trans. público</option>
					    </select>
					</div>
					<div id="map"></div>

				</div>

			</div>
		</div>
	</div>
	
</div>		

<script>
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.607034, lng: -58.375516},
        	zoom: 14,
        	mapTypeId: 'roadmap'
        });
        directionsDisplay.setMap(map);
        
        var origen = document.getElementById('origen').value;
        var destino = document.getElementById('destino').value;

        calculateAndDisplayRoute(directionsService, directionsDisplay,origen,destino);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay,origen,destino);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay,x,y) {
        var selectedMode = document.getElementById('mode').value;
        
        directionsService.route({
        	//origin : origen,
        	//destination : destino,
           	//origin: {lat: 37.77, lng: -122.447},  // Haight.
          	//destination: {lat: 37.768, lng: -122.511},  // Ocean Beach.
          	origin: x,  // Haight.
          	destination: y,  // Ocean Beach.
          	// Note that Javascript allows us to access the constant
          	// using square brackets and a string value as its
          	// "property."
          	travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

    </script>
    <script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvZj61EiOcl1RlGGo3dt9u2OpyqqYkohk&callback=initMap">
	</script>