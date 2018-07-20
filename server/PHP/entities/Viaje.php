<?php

class Viaje
{

	public $id;
 	public $idCliente;
 	public $idConductor;
	public $idEstado;
	public $idDestino;
	public $idOrigen;
	public $pagado;	
	public $pagoCuentaCorriente;	
	public $idMedioPago;	
	public $fechaHora;
	public $idVehiculo;

	public static function InsertViaje( $idCliente, $idDestino, $idOrigen, $idMedioPago, $idVehiculo)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		$sql = "INSERT INTO viaje ( idCliente,  idEstado, idDestino, idOrigen, pagado, 
							pagoCuentaCorriente, idMedioPago, idVehiculo) 
				VALUES ( $idCliente,  1 , $idDestino, $idOrigen, false, false, $idMedioPago,  
							$idVehiculo) ;";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return   $objetoAccesoDato->RetornarUltimoIdInsertado();	
	}

	public static function TraerTodosViajes()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$sql = "Select * from viaje";				 
		$consulta =$objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();					
		$listaViajes = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$listaViajes [] = $registro;
          }
          return $listaViajes ;
	}


	public static function TraerViajesSegunEstado($idEstado)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$sql = "Select * from viaje where idEstado='$idEstado';";				 
		$consulta =$objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();					
		$listaViajes = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$listaViajes [] = $registro;
          }
          return $listaViajes ;
	}

	public static function TraerViajesSegunConductor($idConductor)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$sql = "Select * from viaje where idConductor='$idConductor';";				 
		$consulta =$objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();					
		$listaViajes = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$listaViajes [] = $registro;
          }
          return $listaViajes ;
	}

	public static function TraerViajesSegunCliente($idCliente)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$sql = "Select * from viaje where idCliente='$idCliente';";				 
		$consulta =$objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();					
		$listaViajes = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$listaViajes [] = $registro;
          }
          return $listaViajes ;
	}


 	public static function CancelarViaje($id)
	{
    	   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	
    		// 2 es estado cancelado
		   $sql =  " UPDATE viaje SET  idEstado=2 WHERE id='$id'; " ;
		   $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		   $consulta->execute();
		   return  $consulta->rowCount();	// true/false 
	}

	public static function FinalizarViaje($id)
	{
    	   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	
    		// 3 es estado cancelado
		   $sql =  " UPDATE viaje SET  idEstado=3 WHERE id='$id'; " ;
		   $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		   $consulta->execute();
		   return  $consulta->rowCount();	// true/false 
	}

	public static function AsignarViajeConductor($idViaje, $idConductor)
	{
    	   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	
    		// 2 es estado cancelado
		   $sql =  " UPDATE viaje SET  idConductor='$idConductor' WHERE id='$idViaje'; " ;
		   $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		   $consulta->execute();
		   return  $consulta->rowCount();	// true/false 
	}


}

?>