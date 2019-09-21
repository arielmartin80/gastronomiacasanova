  <div class="align-items-center d-flex cover section-aquamarine py-5" style="  background-image: url(/application/resources/img/fondo.jpg);  background-position: top left;  background-size: 100%;  background-repeat: repeat;">
    <div class="container">
      <h1>Bienvenido
        <?php echo $data['nombre'];?>
      </h1>
      <div class="row">
        <div class="mx-auto col-12 p-3 section-light col-lg-12" style="">
          <div class="carousel slide" data-ride="carousel" id="carouselTestimonial">
            <img class="d-block img-fluid mx-auto rounded-circle" src="/application/resources/img/contacto.jpg" data-holder-rendered="true" width="200" style="">
            <p class="my-3 text-dark lead">
              Su rol es: <b>
                <?php echo $data['rol'];?></b><br>
              DNI: <b>
                <?php echo $data['dni'];?></b><br>
              CUIL: <b>
                <?php echo $data['cuil'];?></b><br>
              Nombre: <b>
                <?php echo $data['nombre'];?></b><br>
              Apellido: <b>
                <?php echo $data['apellido'];?></b><br>
              Direccion: <b>
                <?php echo $data['direccion'];?></b><br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>
