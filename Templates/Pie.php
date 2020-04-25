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
<footer class="page-footer font-small pt-4 text-white">
			<div class="container-fluid text-center text-md-left">
		    	<div class="row blue justify-content-center p-4">
		    		<div class=" text-center col-12">
		    			<a href="https://es-es.facebook.com/" target="_blank">
		    				<img src="img/facebook.png" class="img-fluid">
		    			</a>
		    			<a href=" https://www.instagram.com/?hl=es" target="_blank">
		    				<img src="img/instagram.png" class="img-fluid">
		    			</a>
		    			<a href="https://twitter.com/explore" target="_blank">
		    				<img src="img/twitter.png" class="img-fluid">
		    			</a>
		    			<a href="https://www.youtube.com/" target="_blank">
		    				<img src="img/youtube.png" class="img-fluid">
		    			</a>
		    		</div>
		    	</div>		    
		  	</div>
		  	<div class="footer-copyright text-center blue2 py-3">© 2020 Copyright: Adrián De Hoces
		  	</div>
		</footer>
	</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// Cierra el almacenamiento en búfer de la salida
ob_end_flush();
?>