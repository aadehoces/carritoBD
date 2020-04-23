<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<title>Zykrex</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-11">
				<div class="row justify-content-center bg-light">
					<div class="col-xl-2 col-sm-7 col-6 col-sm-4">
						<a href="index.php"><img src="img/logo.png" class="img-fluid"></a>
					
					</div>
				</div>
			</div>
			
			
			<div class="col-12">
				<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav nav">
							<li class="nav-item">
								<a class="nav-link active" href="index.php" data-toggle="tab"><span class="letra">Inicio</span></a>
						  	</li>
						  	
						  	<li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          <span class="letra">Tienda</span>
						        </a>
						        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown ">
						          <a class="dropdown-item nav-link" href="sobremesa.php">Sobremesa </a>
						          <a class="dropdown-item nav-link" href="portatiles.php">Portátiles</a>
						          <a class="dropdown-item nav-link" href="moviles.php">Móviles</a>
						        </div>
						      </li>
						</ul>
						<div class="ml-auto">
							<div class="btn btn-primary" data-toggle="modal" data-target="#login">
								<span class="letra">Login</span>
							</div>
							<div class="btn btn-primary " data-toggle="modal" data-target="#registro">
								<span class="letra">Registro</span>
							</div>
						</div>
					</div>
					
				</nav>
				<div class="modal fade" id="registro">
					<div class="container">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header bg-primary text-white">
								<h5 class="modal-title">Registro de usuario</h5>
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">X</span>
								</button>
							</div>
							<form class="validar" validate>
								<div class="modal-body">
									<div class="form-group">
								    	<label for="nombre">Nombre</label>
								    	<input type="text" class="form-control" id="nombre" placeholder="Introduce tu nombre" required pattern="^([A-Z]{1}[a-z]{1,}(\s){0,})((\s)[A-Z]{1}[a-z]{1,}(\s){0,}){0,}$">
								  	</div>
								  	<div class="form-group">
								    	<label for="apellidos">Apellidos</label>
								    	<input type="text" class="form-control" id="apellidos" placeholder="Introduce tus apellidos" required
								    	pattern="^([A-Z]{1}[a-z]{1,}(\s){0,})((\s)[A-Z]{1}[a-z]{1,}(\s){0,}){0,}$">
								  	</div>
									<div class="form-group">
								    	<label for="email">Email</label>
								    	<input type="email" class="form-control" id="email" placeholder="Introduce tu email" required pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
							            <div class="invalid-feedback">
							                Email Incorrecto
							            </div>

								  	</div>
									<div class="form-group">
								    	<label for="contraseña">Contraseña:</label>
								    	<input type="password" class="form-control" id="contraseña" placeholder="Introduce tu contraseña" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
							            <div class="invalid-feedback">
							                La contraseña debe de contener al menos una letra mayuscula, una letra minuscula y un numero y debe de tener minimo 8 caracteres.
							            </div>
								  	</div>
								   	<div class="form-inline">
								       	<label>Sexo</label>
								       	<div class="btn-group btn-group-toggle m-2" data-toggle="buttons" required>
								       		<label class="btn btn-primary active">
								       			<input type="radio" name="options" id="option1"  required> Hombre
								       		</label>
								       	</div>
								       	<div class="btn-group btn-group-toggle m-2" data-toggle="buttons">
								       		<label class="btn btn-primary">
								       			<input type="radio" name="options" id="option2" required> Mujer
								       		</label>
								       	</div>

								    </div>
								</div>
								<div class="modal-footer">
									<input class="btn btn-primary" value="Registrar" type="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
				<div class="modal fade" id="login">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header bg-primary text-white">
								<h5 class="modal-title">Inicio de sesion</h5>
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">X</span>
								</button>
							</div>
							<form class="validar" validate>
								<div class="modal-body">
									<div class="form-group">
								    	<label for="email">Email</label>
								    	<input type="email" class="form-control" id="email" placeholder="Introduce tu email" required pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
								    	<div class="valid-feedback">
							                OK
							            </div>
							            <div class="invalid-feedback">
							                Email Incorrecto
							            </div>
								  	</div>
									<div class="form-group">
								    	<label for="contraseña">Contraseña:</label>
								    	<input type="password" class="form-control" id="contraseña" placeholder="Introduce tu contraseña" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
								    	<div class="valid-feedback">
							                OK
							            </div>
							            <div class="invalid-feedback">
							                Contraseña Incorrecta
							            </div>
								  	</div>
								</div>
								<div class="modal-footer">
									<input class="btn btn-primary" value="Iniciar" type="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="container">