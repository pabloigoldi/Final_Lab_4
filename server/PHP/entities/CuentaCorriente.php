<?php

class CuentaCorriente
{

	public $id;
	public $idCliente;
 	public $saldo;
 	public $estado;

  	public static function TraerTodosLasCuentaCorrientes()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from cuentacorriente where estado=1";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}


	public static function EliminarCuentaCorriente($id)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		 $sql = "UPDATE cuentacorriente SET estado=0 WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}


	public static function AltaCuentaCorriente( $idCliente)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO cuentacorriente (idCliente,saldo,estado) VALUES ('$idCliente',0,1);" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function ActualizarSaldoCuentaCorriente($idCliente,$saldo)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		 $sql = "UPDATE cuentacorriente SET saldo=saldo+'$saldo' WHERE idCliente='$idCliente';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}


}  	