<form action="#" method="POST">
	<input class="btn btn-primary" value="Cerrar Sesion" type="submit" name="opcion">
	<?php
	
		echo $_SESSION['tipo'];
		echo $_SESSION['contraseña'];
		echo $_SESSION['email'];
	?>
</form>