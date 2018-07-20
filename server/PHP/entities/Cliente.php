<?php

class Cliente
{

	public $id;
 	public $nombre;
  	public $mail;
  	public $pass;
  	public $estado;
  	public $idDireccion;
  
  	public static function TraerTodosLosClientes()
	{
		  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		  $sql = "Select * from cliente where estado=true";				 
		  $consulta =$objetoAccesoDato->RetornarConsulta($sql);
		  $consulta->execute();					
		  $lista = array();
          while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
          {
            	$lista [] = $registro;
          }
          return $lista ;
	}

	public static function AltaCliente( $nombre, $correo, $clave)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "INSERT INTO cliente (nombre, mail, pass , estado) 
		 		  VALUES ('$nombre','$correo' , '$clave',1);" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function EliminarCliente($id)
	{

		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "UPDATE cliente SET  estado=false WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public static function ActualizaClaveCliente( $id, $clave)
	{
		 $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();			 
		 $sql = "UPDATE cliente 
		 		 SET   pass=$clave
		 		 WHERE id='$id';" ;
		 $consulta = $objetoAccesoDato->RetornarConsulta($sql);
		 $consulta->execute();
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}



}  	