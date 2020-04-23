<?php
	class validar
	{
		
		function __construct(){}
		public function validarNombre($nombre){
			if (empty($nombre)) {
				return 1;
			exit();
			} else{
				if(preg_match('/^([A-Z]{1}[a-z]{1,})(\s[A-Z]{1}[a-z]{1,}){0,}$/', $nombre)){
					
					return 0;
				}else{
					return 2;
					
				}	
			}
		}

		public function validarApellidos($apellidos){
			if (empty($apellidos)) {
				return 1;
			} else {
				if(preg_match('/^([A-Z]{1}[a-z]{1,})(\s[A-Z]{1}[a-z]{1,}){0,}$/', $apellidos)){
					return 0;
				}else{
					return 2;
				}	
			}
		}

		public function validarDni($dni){
			if (empty($dni)) {
				return 1;
			} else{
				if (validar::letra($dni)) {
					return 0;
				} else {
					return 2;
				}
			}
		}

		function letra($dni){
			$numeros=substr($dni, 0,8);
			$letra=substr($dni, 9);
			$resto = $numeros%23;
			if ($resto==0 && $letra=='T') {
				return True;
			}elseif ($resto==1 && $letra =='R') {
				return True;
			}elseif ($resto==2 && $letra =='W') {
				return True;
			}elseif ($resto==3 && $letra =='A') {
				return True;
			}elseif ($resto==4 && $letra =='G') {
				return True;
			}elseif ($resto==5 && $letra =='M') {
				return True;
			}elseif ($resto==6 && $letra =='Y') {
				return True;
			}elseif ($resto==7 && $letra =='F') {
				return True;
			}elseif ($resto==8 && $letra =='P') {
				return True;
			}elseif ($resto==9 && $letra =='D') {
				return True;
			}elseif ($resto==10 && $letra =='X') {
				return True;
			}elseif ($resto==11 && $letra =='B') {
				return True;
			}elseif ($resto==12 && $letra =='N') {
				return True;
			}elseif ($resto==13 && $letra =='J') {
				return True;
			}elseif ($resto==14 && $letra =='Z') {
				return True;
			}elseif ($resto==15 && $letra =='S') {
				return True;
			}elseif ($resto==16 && $letra =='Q') {
				return True;
			}elseif ($resto==17 && $letra =='V') {
				return True;
			}elseif ($resto==18 && $letra =='H') {
				return True;
			}elseif ($resto==19 && $letra =='L') {
				return True;
			}elseif ($resto==20 && $letra =='C') {
				return True;
			}elseif ($resto==21 && $letra =='K') {
				return True;
			}elseif ($resto==22 && $letra =='E') {
				return True;
			}else{
				return False;
			}
		}

		public function validarTelefono($telefono){
			if (empty($telefono)) {
				return 1;
			} else {
				if(preg_match('(^(\+[0-9]{1,2})?([0-9]{9})\b)', $telefono)){
					return 0;
				}else{
					return 2;
				}	
			}
		}


		public function validarDireccion($direccion){
			if (empty($direccion)) {
				return 1;
			} else {
				if(preg_match('(^(([A-Z]{1})\D{1,}\b(\s[a-z]{1,}\b){0,})(,(\s)?[0-9]{1,})\b)', $direccion)){
					return 0;
				}else{
					return 2;
				}	
			}
		}

		public function validarProvincia($provincia){
			if (empty($provincia)) {
				return 1;
			} else {
				if(preg_match('(^(([A-Z]{1})[a-z]{1,}\b(\s([A-Z]{1})[a-z]{1,}\b){0,})\b)', $provincia)){
					return 0;
				}else{
					return 2;
				}	
			}
		}

		public function validarLocalidad($localidad){
			if (empty($localidad)) {
				return 1;
			} else {
				if(preg_match('(^(([A-Z]{1})[a-z]{1,}\b(\s([A-Z]{1})[a-z]{1,}\b){0,})\b)', $localidad)){
					return 0;
				}else{
					return 2;
				}	
			}
		}

		public function validarPostal($postal){
			if (empty($postal)) {
				return 1;
			} else {
				if(preg_match('(^([0-9]{5})\b)', $postal)){
					return 0;
				}else{
					return 2;
				}	
			}
		}

		public function validarEmail($email){
			if (empty($email)) {
				return 1;
			} else {
				if(preg_match('(^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$)', $email)){
					return 0;
				}else{
					return 2;
				}	
			}
		}

		public function validarContraseña($contraseña){
			if (empty($contraseña)) {
				return 1;
			} else {
				if(preg_match('(^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$)', $contraseña)){
					return 0;
				}else{
					return 2;
				}	
			}
		}
	}
?>