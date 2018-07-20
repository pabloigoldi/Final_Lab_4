<?php


require_once('AccesoDatos.php'); 

class Login
{

	public $id;
 	public $nombre;
 	public $clave;
 	public $correo;
 	public $tipo;

	public static function ejecute($nombre, $mail, $clave)
	{

		return true;
		// $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		// $sql = "Select id , nombre , clave , correo , tipo
		// 		from misusuarios 
		// 		where correo='".$mail."'  and nombre='".$nombre."' 
		// 			 and clave='".$clave."'  ;" ;
		// $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		// $consulta->execute();					
		// return $consulta->fetchObject("Login");	
	}
}

?>