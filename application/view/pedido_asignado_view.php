
<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
	
	<div class="py-5">
		<div class="container">
	      	<div class="row">
	        	<div class="col-12 text-warning">
	          		<h1>Carrito</h1>
	          		<hr class="mb-4">
	          	</div>
	        </div>
	        <div class="row">
				<div class="col-md-7 p-3">
					<?php


					if(isset($data)){
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
							 "razonSocial: " . $data['razonSocial'] . "<br><br>" .
							 "DIRECCION DEL COMERCIO: " . $data['puntoDeVenta'] . "<br>" .
							 "<br><br><br>";
							 
						echo "<a type='button' href='/pedidos/cancelar?id=$id' class='btn btn-danger btn-lg'>Cancelar Pedido</a>
							  <a type='button' href='/pedidos/asignado?id=$id' class='btn btn-success btn-lg'>✓</a>
							  <br><br><br>";
					}

					else echo "
							<div class='row'>
								<div class='p-3 mb-2 bg-dark text-white'><h3>No hay un pedido asignado</h3> </div>
							</div>
							<div class='row'>
								<a href='/pedidos/pendientes'>← volver</a>
							</div>
						";

					?>
				</div>
				<div class="col-md-5 p-3 ">
					<div id="floating-panel">
					    <b>Mode of Travel: </b>
					    <select id="mode">
					      <option value="DRIVING">Driving</option>
					      <option value="WALKING">Walking</option>
					      <option value="BICYCLING">Bicycling</option>
					      <option value="TRANSIT">Transit</option>
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
<!--br><br><br>
Esta pantalla debe mostrar la direccion del comercio, un detalle del pedido y dos botones, uno para cancelar y otro para pasar al siguiente estado.
<br><br-->

