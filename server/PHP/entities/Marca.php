<?php

class Marca
{

	public $id;
 	public $descripcion;

  	public static function TraerTodosLasMarcas()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from marca";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

	public static function AltaMarca( $descripcion)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO marca (descripcion) VALUES ('$descripcion');" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function EliminarMarca($id)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		 $sql = "DELETE FROM marca WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

}  	