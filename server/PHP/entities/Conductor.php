<?php

include "AccesoDatos.php" ;


class Conductor
{

	public $id;
 	public $nombre;
  	public $correo;
  	public $clave;
  	public $idVehiculo;

  	public static function TraerTodosLosConductores()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from conductor where estado=true";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}



	public static function AltaConductor( $nombre, $correo, $clave, $idVehiculo)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO conductor (nombre, correo, clave , idVehiculo, estado) 
		 						VALUES ('$nombre','$correo' , '$clave','$idVehiculo', 1);" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function EliminarConductor($id)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "UPDATE conductor SET  estado=false WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function ActualizaClaveConductor( $id, $clave)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "UPDATE conductor 
		 		 SET   clave=$clave
		 		 WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function ActualizaVehiculoConductor( $id, $idVehiculo)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "UPDATE conductor 
		 		 SET   idVehiculo=$idVehiculo
		 		 WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}


}  	