<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
			
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			//self::$conexion= new PDO('mysql:host=localhost;dbname=registro','root','',$pdo_options); /*Para mi localhost*/
			self::$conexion= new PDO('mysql:host=localhost;dbname=Zykrex','root','',$pdo_options); /*Para el hosting*/
			return self::$conexion;
		}		
	} 
?>