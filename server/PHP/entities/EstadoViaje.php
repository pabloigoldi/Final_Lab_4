<?php

class EstadoViaje
{

	public $id;
 	public $estado;

  	public static function TraerTodosLosEstados()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from estadoviaje";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

}  	