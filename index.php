<?php
//añadimos la cabecera 
 include("Templates/cabecera.php")
?>
<div class="row p-2">
    <div class="col-md-8">
        <div id="demo" class="carousel slide" data-ride="carousel">
         <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
          </ul>
         <div class="carousel-inner">
          <div class="carousel-item active text-center">
            <a href="portatiles.php"><img src="img/msi.jpg" alt="Msi" class="img-fluid"></a>
          <div class="carousel-caption text-dark pt-5">
           <h4 class="d-none d-md-block">MSI GF63 Thin 9SC-047XES</h4>
           <p class="d-none d-xl-block">Intel Corei7-9750H/16GB/512GB SSD/GTX 1650/15.6</p>
          </div>
         </div>
         <div class="carousel-item text-center">
          <a href="sobremesa.php"><img src="img/amd.jpg" alt="AMD"></a>
          <div class="carousel-caption text-dark class="img-fluid>
           <h4 class="d-none d-md-block">PcCom Silver AMD Ryzen 5</h4>
           <p class="d-none d-xl-block">16GB/240GB SSD+1TB/GTX1650</p>
          </div>
         </div>
         <div class="carousel-item text-center">
          <a href="moviles.php"><img src="img/xiaomi.jpg" alt="Xiaomi" class="img-fluid"></a>
          <div class="carousel-caption text-dark class="img-fluid>
           <h4 class="d-none d-md-block">Xiaomi Redmi Note 8 Pro</h4>
           <p class="d-none d-xl-block">6/128Gb Azul Libre</p>
          </div>
         </div>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev text-dark" href="#demo" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
         <span class="carousel-control-next-icon"></span>
          </a>

        </div>
       </div>
       <div class="col-md-4 d-none d-sm-block">
        <div class="embed-responsive embed-responsive-4by3 mt-4">
         <iframe width="560" height="315" src="https://www.youtube.com/embed/WYvMdPuDrq0" frameborder="0" allow="accelerometer; autoplay; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
       </div>
      </div>
      <div class="row p-4 ">
       <div class="col-12">
        <h3>Servicios</h3>
       </div>
       <div class="col-md-3 text-center">
        <div class="thumbnail">
         <img src="img/web.jpg" alt="Creación de páginas web" class="img-fluid rounded">
         <div class="caption mt-2 ">
          <h4>Creación de páginas web</h4>                                    
         </div>
        </div>
       </div>
       <div class="col-md-3 text-center">
        <div class="thumbnail">
         <img src="img/equipos.jpg" alt="Creación de páginas web" class="img-fluid rounded">
         <div class="caption mt-2">
          <h4>Montaje y Mantenimiento de equipos</h4>                                 
         </div>
        </div>
       </div>
       <div class="col-md-3 text-center">
        <div class="thumbnail">
         <img src="img/redes.jpg" alt="redes" class="img-fluid rounded">
         <div class="caption mt-2">
          <h4>Montaje de redes</h4>                                   
         </div>
        </div>
       </div>
       <div class="col-md-3 text-center">
        <div class="thumbnail">
         <img src="img/bd.png" alt="Creación de páginas web" class="img-fluid rounded">
         <div class="caption mt-2">
          <h4>Bases de datos</h4>
         </div>
        </div>
       </div>
  <div class="container">
   <div class="row bg-light border">
    <div class="col-md-4 col-12 mt-4">
     <div class="list-group">
      <a class="list-group-item list-group-item-action active" data-toggle="list" href="#somos">Quienes somos</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#contactar">Contactar</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#mapa">Donde nos encontramos</a>
     </div>
    </div>
    <div class="col-md-8 col-12 mt-4">
     <div class="tab-content">
      <div class="tab-pane fade active show" id="somos">
       <div class="row">
        <div class="col-12">
         <h3>Quienes somos</h3>
         <p>Zykrex es una empresa dedicada a las nuevas tecnologias, nuestra empresa imparte varios servicios como la creación de páginas web, o el montaje y matenimiento de equipos entre otros. </p>
        </div>
        
       </div>
       <div class="row justify-content-center">
        <div class="col-4">
         <img src="img/logo.png" class="img-fluid">
        </div>
       </div>
       
       
      </div>
      <div class="tab-pane fade" id="contactar">
       <h3>Contacta con nosotros</h3>
       <form>
         <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="email@ejemplo.com" required>
         </div>
         <div class="form-group">
        <label for="motivo">Motivo de consulta:</label>
        <select class="form-control" name="motivo" required>
         <option>Contratar Servicio</option> 
         <option>Problemas de compra</option>    
         <option>Sugerencias</option>    
         <option>Otro</option>   
        </select>
         </div>
         <div class="form-group">
        <label for="descripcion">Descripcion:</label>
        <textarea class="form-control" id="descripcion" rows="3" required></textarea>
         </div>
         <button type="submit" class="btn btn-primary mb-2">Enviar</button>
       </form>
      </div>

      <div class="tab-pane fade" id="mapa">
       <div class="row">
        <div class="col-12">
         <h3>Localización</h3>
         <p>Nos encontramos en calle San Antón,72 Granada.</p>
        </div>
       </div>
       
       <div class="row pr-4 pl-4 mt-2 mt-md-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.362738331987!2d-3.601363084419682!3d37.16784965461688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcbd2aaf12cb%3A0x43fedf859124b5ff!2sCalle%20San%20Ant%C3%B3n%2C%2072%2C%2018005%20Granada!5e0!3m2!1ses!2ses!4v1586516846045!5m2!1ses!2ses"  width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> </div>
       </div>
      </div>

    </div>
  </div>
   </div>
  </div>
  <div class="alert alert-primary alert-dismissible fade show myAlert-bottom text-center" role="alert" auto-close="8000">
    <p>Éste sitio web usa cookies, si permanece aquí acepta su uso. Puede leer más sobre el uso de cookies en nuestra <a href="#">política de privacidad</a>.
    </p>
    <button type="button" class="close" data-dismiss="alert" arial-label="close">
      <span aria-hidden="true">X</span>
    </button>


<script type="text/javascript">
  //Funcion para cerrar notificacion de cookies en unos segundos
  $(function() {
      var alert = $('div.alert[auto-close]');
      alert.each(function() {
        var that = $(this);
        var time_period = that.attr('auto-close');
        setTimeout(function() {
            that.alert('close');
        }, time_period);
     });
  });
</script>
<?php
//añadimos el pie de página
 include("Templates/Pie.php")
?>