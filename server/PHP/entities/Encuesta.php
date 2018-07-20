<?php

class Encuesta
{

	public $id;
 	public $idViaje;
  	public $comentario;
  	public $calificacion;

	public static function InsertarEncuesta( $idViaje,$calificacion, $comentario)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO encuesta( idViaje, calificacion, comentario) 
		 			VALUES ('$idViaje' , '$calificacion', '$comentario');";
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function EliminarEncuesta($id)
	{

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		$sql = "Delete from encuesta where id=".$id."  ;";	 	
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return  $consulta->rowCount();		// true/false 	
	}

		public static function ActualizarEncuesta($id, $comentario)
	{

		    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	
		    $sql =  " UPDATE encuesta SET  comentario='$comentario' WHERE id='$id'; " ;
		   $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		   $consulta->execute();
		   return  $consulta->rowCount();	// true/false 	
	}



	public static function TraerTodaLasEncuestas()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from encuesta";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $listaEncuesta = array();
          while($registroEncuesta = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$listaEncuesta [] = $registroEncuesta;
          }
          return $listaEncuesta ;
	}

}  	