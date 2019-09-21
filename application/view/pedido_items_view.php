<?php #echo"<br><br><pre>";print_r($data);echo"</pre>"; ?>
<style type="text/css">
.table>tbody>tr>td,
.table>tfoot>tr>td {
  vertical-align: middle;
}

@media screen and (max-width: 600px) {
  table#cart tbody td .form-control {
    width: 20%;
    display: inline !important;
  }
  .actions .btn {
    width: 36%;
    margin: 1.5em 0;
  }
  .actions .btn-info {
    float: left;
  }
  .actions .btn-danger {
    float: right;
  }
  table#cart thead {
    display: none;
  }
  table#cart tbody td {
    display: block;
    padding: .6rem;
    min-width: 320px;
  }
  table#cart tbody tr td:first-child {
    background: #333;
    color: #fff;
  }
  table#cart tbody td:before {
    content: attr(data-th);
    font-weight: bold;
    display: inline-block;
    width: 8rem;
  }
  table#cart tfoot td {
    display: block;
  }
  table#cart tfoot td .btn {
    display: block;
  }
}
</style>
<script>
	function getCantidad(){
	  cant = document.getElementById("cantidad").value;
	  2 = document.getElementById("Alto").value;
	  r = m1*m2;m
	  document.getElementById("superficie").value = r;
	}
</script>
<div class="py-5 text-center text-white" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, .60), rgba(0, 0, 0, .60)), url(/application/resources/img/fondoItem.jpg);	background-position: top left;	background-size: 100%;	background-repeat: repeat;">

	<?php
		if(isset( $_SESSION['mje'] ) ){
			echo $_SESSION['mje'];
			unset($_SESSION['mje']);
		};
	?>

	<div class="py-5">
		<div class="container">
	      	<div class="row">

	        	<div class="col-12">
	          		<h2>Pedido </h2>
	          		<hr class="mb-4">
	          	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12 p-3">
	        		<div class="container">
  						<table id="cart" class="table table-hover table-condensed">
						    <thead>
						      <tr>
						        <th style="width:70%">Producto</th>
						        <th style="width:10%">Precio</th>
						        <th style="width:10%">Cantidad</th>
						        <th style="width:10%" class="text-center">Subtotal</th>
						        
						      </tr>
						    </thead>
						    <tbody>
						      <?php

									
								$idComercio = (@$_SESSION['idComercio']);
									
						if($data){
								foreach ($data as $key => $product) {

									$id = $product['id_item'];
									$nombre = $product['nombre'];
									$descripcion = $product['descripcion'];
									$precio = $product['precio'];
									$cantidad = $product['cantidad'];


								  
									echo"  
									  <tr>
										<td data-th='Product'>
										  <div class='row'>
											<div class='col-sm-4 hidden-xs'><img src='/application/resources/img/items/$id.jpg'  class='img-fluid' /></div>
											<div class='col-sm-8'>
											  <h4 class='nomargin'>$nombre</h4>
											  <p>$descripcion</p>
											</div>
										  </div>
										</td>
										<td data-th='Price' id='precio'> $$precio</td>
										<td data-th='Quantity'>".
											//<input type='number' id='cantidad' class='form-control text-center' value='$cantidad'>
											$cantidad
											."
										</td>
										<td data-th='Subtotal' class='text-center'>$".$precio*$cantidad."</td>

									  </tr>
									 ";


									 @$total = @$total + ($precio*$cantidad);
									 
								}
						}
									$_SESSION['monto'] = @$total;

							  ?>
						    </tbody>
						    <tfoot>
						      <tr>
						        <td><a href="javascript:window.history.go(-1);" class="btn btn-warning"><i class="fa fa-angle-left"></i> Volver</a></td>
						        <td colspan="2" class="hidden-xs"></td>
						        <td class="hidden-xs text-center"><strong>Total $<?php echo @$total ?></strong></td>
						        
						      </tr>
						    </tfoot>
						  </table>
					</div>
	        	</div>
	        
	        </div>

        </div>
      </div>
	</div>

</div>

