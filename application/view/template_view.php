<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

	<!-- CAMBIAR ESTO CUANDO EL PROFESOR ARREGLE EL MVC
	<link rel="stylesheet" href="<?php echo $this->path->getPath("css", "aquamarine.css");  ?>" type="text/css">	
	<script src="<?php echo $this->path->getPath("js", "navbar-ontop.js");  ?>"></script>
	<script src="<?php echo $this->path->getPath("js", "animate-in.js");  ?>"></script>
	<script src="<?php echo $this->path->getPath("js", "smooth-scroll.js");  ?>" ></script>
	-->
  
    <link rel="stylesheet" href="/application/resources/css/inputFile.css" type="text/css">
    <link rel="stylesheet" href="/application/resources/css/aquamarine.css" type="text/css">
    <link rel="stylesheet" href="/application/resources/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/application/resources/css/theme.css" type="text/css">
    <link rel="stylesheet" href="/application/resources/css/estiloMapa.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- Script: Smooth scrolling between anchors in the same page -->
	  <script src="/application/resources/js/navbar-ontop.js"></script>
    <script src="/application/resources/js/animate-in.js"></script>
    <script src="/application/resources/js/smooth-scroll.js"></script>
    <script src="/application/resources/js/jquery.min.js"></script>
    <script src="/application/resources/js/bootstrap.min.js"></script>

    <title><?php echo WEBNAME?></title>
  <style type="text/css">
    @media screen and (max-width:360px ) {

      .avatar {
        float:right;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        }
      }
      .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
      } 
      .menu_bar span {
        font-size: 16px;
        text-align: center;
        padding: 5px;

      }
      .menu_bar li {
        padding-top: 13px;

      }
  </style>
</head>

<body onload="initialize()">
   
	<?php 

		if( isset($_SESSION['user']['rol']) ){
			//print_r( $_SESSION);

			/*echo "Usuario: ".$_SESSION['nombre']." ".$_SESSION['apellido'];
			echo " Rol: ".$_SESSION['rol'];

			echo " <a href='#'>Compras: 0</a>";

			echo " <a href='/login/logout'>LOGOUT</a> ";*/
			
			echo "
				<nav class='navbar navbar-expand-md navbar-dark bg-warning fixed-top'>
					<div class='container'>
						<a class='navbar-brand tituloHome' href='/login/home'> <i class='fa d-inline fa-lg fa-trophy'></i>  <b>&nbsp;".WEBNAME."</b></a>
				      
					  <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbar2SupportedContent'>
					   	<span class='navbar-toggler-icon'></span>
					  </button>
				      
				    <div class='collapse navbar-collapse text-center justify-content-end' id='navbar2SupportedContent'>

				        	<ul class='navbar-nav menu_bar'>	          	
					          	<li> 
                          <span>Bienvenido ".$_SESSION['user']['rol'].", <a href='/usuario/perfil' style='color:white;'>". $_SESSION['user']['nombre']." ".$_SESSION['user']['apellido'] ."</a></span> 
                          <span><img class='avatar' src='/application/resources/img/usuarios/".$_SESSION['user']['id_usuario'].".jpg' alt='Card image cap'></span> 

                      </li> 
                      <li><a class='btn navbar-btn ml-2 text-white btn-secondary' href='/login/logout'><i class='fa fa-user-times'></i>&nbsp;Cerrar</a></li>
				        	</ul>

				    </div>
			  </div>
			</nav>";
		}
	?>

    <?php include 'application/view/'.$content_view; ?>

<!-- FOOTER INI    -->
  
  <div class="footer bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-warning"><?php echo WEBNAME?></h2>
          <p class="text-white">Una empresa que contacta vendedores gastronomicos con clientes a travez de repartidores independientes.</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-warning">Mapsite</h2>
          <ul class="list-unstyled">
            <li><a href='/login/home' class="text-white">Home</a><br /></li>
            <li><a href="#" class="text-white">Nosotros</a><br /></li>
            <li><a href="#" class="text-white">Servicios</a><br /></li>
          </ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-warning">Contacto</h2>
          <p>
            <a href="tel:+246 - 542 550 5462" class="text-white">
              <i class="fa d-inline mr-3 text-warning fa-phone"></i>+246 - 542 550 5462</a>
          </p>
          <p>
            <a href="mailto:info@pingendo.com" class="text-white">
              <i class="fa d-inline mr-3 text-warning fa-envelope-o"></i>info@club.com</a>
          </p>
          <p>
            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank">
              <i class="fa d-inline mr-3 fa-map-marker text-warning"></i>365 Park Street, NY</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-warning">Informacion</h2>
          <form>
            <fieldset class="form-group text-white">
              <label for="exampleInputEmail1">Mandanos tu email</label>
              <input type="email" class="form-control" placeholder="Enter email"> </fieldset>
            <button type="submit" class="btn btn-outline-warning">Enviar</button>
          </form>
        </div>
      </div>

    </div>
  </div>
<!--   FOOTER FIN    -->


</body>

</html>