<?php #echo"<br><br><pre>";print_r($data);echo"</pre>"; ?>
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

	//Better to construct options first and then pass it as a parameter
	var options = {
		title: {
			text: "Ventas mensual"              
		},
		data: [              
		{
			color: "#546BC1",
			type: "column",
			dataPoints: [
				{ x: new Date("1 Jan 2018"), y: 00000 },
				{ x: new Date("1 Feb 2018"), y: 10000 },
				{ x: new Date("1 Mar 2018"), y: 00000 },
				{ x: new Date("1 Apr 2018"), y: 00000 },
				{ x: new Date("1 May 2018"), y: 50000 },
				{ x: new Date("1 Jun 2018"), y: 00000 },
				{ x: new Date("1 Jul 2018"), y: 00000 },
				{ x: new Date("1 Aug 2018"), y: 00000 },
				{ x: new Date("1 Sep 2018"), y: 00000 },
				{ x: new Date("1 Oct 2018"), y: 00000 },
				{ x: new Date("1 Nov 2018"), y: 31160 },
				{ x: new Date("1 Dec 2018"), y: 76400 }
			]
		}
		]
	};

	$("#chartContainer").CanvasJSChart(options);
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
		<div class="row">
			<div class="mx-auto col-md-10 p-4">

				<div class="row">
					<div class="col-12 text-light">
						<h1>Pedidos sin Liquidar</h1><br>
					</div>
				</div>

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

						
				<?php

					if(isset($data)){
						echo "
			<div class='row'>
				
				<div class='col-md-12 p-3'>
						";

						echo "
							<div class='table-responsive text-nowrap'>
							<table class='table'>
							  <thead>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Fecha</th>
							      <th scope='col'>Monto Pedido</th>
							      <th scope='col'>Repartidor</th>
							      <th scope='col'>Sistema</th>
							      <th scope='col'>Comercio</th>
							    </tr>
							  </thead>
							  <tbody>";

						foreach ( $data as $id => $rows ) {
						   echo "<tr>
						      <th scope='row'>$id</th>
						      <td>$rows[fecha_pedido]</td>
						      <td>$ $rows[monto]</td>
						      <td>$ $rows[monto_repartidor]</td>
						      <td>$ $rows[monto_sistema]</td>
						      <td>$ $rows[monto_comercio]</td>";


								"</tr>";
								};
						echo "
							  </tbody>
							</table>
							</div>
						";
						echo "
							</div>

			</div><!-- fin del row -->
					";
					}
					else echo"
			<div class='row'>			
				<div class='col-md-12 p-3 '>
					<div class='p-3 mb-2 bg-dark text-white centered'>
						<h3>No hay importes sin liquidar</h3>
					</div>
				</div>
			</div>";
					?>
					
			</div>
		</div>
	</div>
</div>	
