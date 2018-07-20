<?php

class Vehiculo
{

	public $id;
 	public $idMarca;
  	public $idModelo;
  	public $anio;
  	public $estado;

  	public static function TraerTodosLosVehiculos()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from vehiculo where estado=true";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

	public static function AltaVehiculo( $idMarca, $idModelo, $anio)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO vehiculo (idMarca, idModelo, anio ,estado) 
		 						VALUES ('$idMarca','$idModelo' , '$anio', 1);" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function EliminarVehiculo($id)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "UPDATE vehiculo SET  estado=false WHERE id='$id';" ;
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