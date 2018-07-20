<?php

class Localidad
{

	public $id;
 	public $descripcion;

  	public static function TraerTodosLasLocalidades()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from localidad";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

	public static function AltaLocalidad ($descripcion)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO localidad (descripcion) VALUES ('$descripcion');" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function EliminarLocalidad ($id)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		 $sql = "DELETE FROM localidad WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

}  	