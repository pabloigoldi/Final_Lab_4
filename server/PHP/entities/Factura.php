<?php

class Factura
{

	public $id;
	public $monto;
	public $fecha;
 	public $idViaje;
 	public $idCliente;
 	public $pagada;

  	public static function TraerTodasLasFacturas()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from factura";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

	public static function TraerTodasLasFacturasPorClientes($idCliente)
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from factura where idCliente='$idCliente';";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

	public static function TraerTodasFacturasPorClientesNoPagas($idCliente)
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from factura where idCliente='$idCliente' and pagada=0;";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}


	public static function ActualizarFacturaPaga($id)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		 $sql = "UPDATE factura SET pagada=1 WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function AltaFactura($monto, $idViaje, $idCliente, $pagada)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO factura (monto,fecha,idViaje, idCliente,pagada) 
		 					VALUES ('$monto',CURDATE(),'$idViaje','$idCliente','$pagada');" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	

}  	