<!--?php echo"<br><br><pre>";print_r($data);

$cadFecha="2018-12-03";

$hoy = date("d M Y"); 

$date = new DateTime('2018-12-03');
$date->format('d M Y');

echo  $data['liquidacion']['clientes'];


echo"</pre>"; ?>

<!--script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script-->
<script src="/application/resources/js/jquery.canvasjs.min.js"></script>

<!-- 
		Consulta a incorporara para las estadisticas
SELECT
    sum(monto_comercio) as total_mes, 
    sum(monto_comercio)/(	SELECT SUM(monto_comercio) 
				FROM importes ) * 100 as porcentaje_venta,
	MONTH(fecha_pedido) as mes
FROM importes 
GROUP BY MONTH(fecha_pedido);

 -->

<script>

window.onload = function () {

	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		theme: "light1", // "light1", "light2", "dark1", "dark2"
		title: {
			text: "Ventas del <?php echo $data['liquidacion']['fecha_desde'];?>  a  <?php echo $data['liquidacion']['fecha_hasta'];?>"
		},
		axisY: {
			title: "Ventas (en $)",
			suffix: "$",
			includeZero: false
		},
		axisX: {
			title: "Fechas"
		},
		data: [{
			type: "column",
			yValueFormatString: "#,##0.0#\"$\"",
			dataPoints: [
				<?php foreach ($data['sumas'] as $key => $value): ?>
					<?php 
						$y =  $value['total_comercio'] ;
						if($data['liquidacion']['rol'] == 'Comercio'){
              				$y =$value['total_comercio'];
          				}
          				if($data['liquidacion']['rol']=='Repartidor'){
          					$y =$value['tolal_repartidor'];
          				}
          				
					?>

				 		{ label: "<?php echo $key; ?>", y: <?php echo $y?> },

				<?php endforeach ?>
				
			]
		}]
	});
	chart.render();

	}
</script>

<style type="text/css">
	.redonda {
	    width: 90%;
	    height: 90%;
	    border-radius: 50%;
	    border: solid 3px white;
	    font-size: x-small;
	    overflow: hidden;
	    padding: 12px;
	    margin-left: 5px
	}
</style>
<div class="py-5 text-white text-center" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .40), rgba(0, 0, 0, .40)), url(/application/resources/img/fondoItem.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">

	<div class="container">
		<div class="mx-auto col-md-10 p-4">
			<div class="row">
				<div class="col-md-12 col-xs-12 text-light">
					<h1>Detalle de la liquidacion</h1><br>
				</div>
			</div><!-- fin del row -->
			<div class="row ">
				<div class="mx-auto col-md-10 p-4" style="">
				<nav class="navbar navbar-expand-md navbar-light nav nav-pills nav-fill">
					<div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
							<ul class="navbar-nav">

				                <li class="nav-item nav-link active mx-2 border border-warning"> <a class="nav-link navbar-brand mr-0 text-light" href="javascript:window.history.go(-1);">
				                  		<b> VOLVER</b></a>
				                </li>
				                
							</ul>
						</div>
					</div>
				</nav>
				</div>
			</div><!-- fin del row -->	

			
				<?php


					if(isset($data['pedidos'])){
						echo "
			<div class='row'>
				
				<div class=' col-lg-8  col-md-8 col-xs-12 p-3 '>
						";

						echo "
							<div class='table-responsive text-nowrap'>
							<table class='table'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Fecha</th>
							      <th scope='col'>Importe</th>
							      <th scope='col'>Repartidor</th>
							      <th scope='col'>Sistema</th>
							      <th scope='col'>Comercio</th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data['pedidos'] as $id => $rows ) {
						echo "<tr>
						      	<th scope='row'>$id</th>
						      	<td>$rows[fecha_pedido]</td>
						      	<td>$rows[monto]</td>
						      	<td>$rows[monto_repartidor]</td>
						      	<td>$rows[monto_sistema]</td>
						      	<td>$rows[monto_comercio]</td>";

							"</tr>";
	
								};



								$id_liquidacion = $data['liquidacion']['id'];
								$ganancia_repartidor = $data['liquidacion']['ganancia_repartidor'];
								$ganancia_comercio = $data['liquidacion']['ganancia_comercio'];
								$ganancia_sistema = $data['liquidacion']['ganancia_sistema'];
								$importe_total = $ganancia_repartidor + $ganancia_comercio + $ganancia_sistema;
						echo "
								<tr scope='col'>
									<th>$id_liquidacion</th>
						      		<th>TOTALES</th>
						      		<th>$importe_total</th>
						      		<th>$ganancia_repartidor</th>
						      		<th>$ganancia_sistema</th>
						      		<th>$ganancia_comercio</th>
								</tr>

							  </tbody>
							</table>
							</div>
						";

								$clientes = $data['liquidacion']['clientes'];
								$ventas = $data['liquidacion']['ventas'];

					echo "
							</div>
				<div class='col-lg-4 col-md-4 col-xs-12 p-3 '>
					<div class='row'>
						<div class='col-lg-6 col-md-4 col-xs-2 '> 
							<div class='redonda' >
								<p>Cant. Vtas.</p>
								<h2>";

								echo $data['ventas']."</h2>
							</div>
						</div>
						<div class='col-lg-6 col-md-4 col-xs-2'>
							<div class='redonda' >
								<p>Cant. Clientes</p>
								<h2>";
								echo $data['liquidacion']['clientes']."</h2>
							</div>
						</div>
					</div>
					<div id='chartContainer' style='height: 250px; width: 100%;'></div>

				</div>

			</div><!-- fin del row -->
					";
					}else 

					echo"
			<div class='row'>			
				<div class='col-md-12 p-3 '>
						<div class='p-3 mb-2 bg-dark text-white centered'><h3>No hay pedidos pendientes por el momento asdsadsda</h3></div>
				</div>
			</div>";
					?>
				
			<div class="row">
				
			</div>
		</div>
	</div><!-- fin del container -->
</div>	
