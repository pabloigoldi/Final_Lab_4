<?php

include 'entities/Encuesta.php';

include 'entities/Viaje.php';

include 'entities/Conductor.php';

include 'entities/Vehiculo.php';

include 'entities/Marca.php';

include 'entities/Modelo.php';

include 'entities/MedioPago.php';

include 'entities/EstadoViaje.php';

include 'entities/Localidad.php';

include 'entities/Cliente.php';

include 'entities/CuentaCorriente.php';

include 'entities/Factura.php';

include 'entities/Pago.php';

include 'entities/Login.php';




class Nexo
{



    function getArraySinSession(){
        $mensaje_sin_session = "No posee session para realizar esta accion.";
        $arrayResponse = array("Mensaje" => $mensaje_sin_session,"Success" => false);
        return json_encode ($arrayResponse);
    }

    function getArrayResponse($resultado, $success){
        $arrayResponse = array("Result" => $resultado ,"Success" => $success);
        return json_encode ($arrayResponse);
    }




    /* Login*/
    public static function Login($nombre, $mail, $clave, $tipoUser){      
        $resultado  = Login::ejecute($nombre, $mail, $clave);

        if($resultado != false){
                ///setcookie("cookieTest","Soy la cookie1",time()+3600);
                session_start();                
                $_SESSION['haySession'] = true; 
                echo self::getArrayResponse($resultado, true);

            }else{
                echo self::getArrayResponse("Datos incorrectos.", false);
            }

    }

    public static function Deslogin(){  
            session_start(); 
            if (isset($_SESSION['haySession']))
            {

                unset($_SESSION['haySession']);
                echo json_encode (true);
            }
            else
            {
                echo self::getArraySinSession();
            }
    }
/* Fin de Login*/
    

    public static function getEncuestas(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Encuesta::TraerTodaLasEncuestas();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function InsertarEncuesta($idViaje,$calificacion,$comentario){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= Encuesta::InsertarEncuesta($idViaje,$calificacion,$comentario);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function EliminarEncuesta($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta = Encuesta::EliminarEncuesta($id);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }


    //Conductor
    public static function getConductor(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Conductor::TraerTodosLosConductores();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function AltaConductor($nombre,$correo,$pass,$idVehiculo){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=Conductor::AltaConductor($nombre,$correo,$pass,$idVehiculo);  
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }


    public static function EliminarConductor($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta = Conductor::EliminarConductor($id);     
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function ActualizaClaveConductor($id,$pass){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta = Conductor::ActualizaClaveConductor($id,$pass);  
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function ActualizaVehiculoConductor($id,$idVehiculo){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta = Conductor::ActualizaVehiculoConductor($id,$idVehiculo);  
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Vehiculo
    public static function getVehiculos(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Vehiculo::TraerTodosLosVehiculos(); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaVehiculo($idMarca,$idModelo,$anio){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta['listado']=Vehiculo::AltaVehiculo($idMarca,$idModelo,$anio); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }


    public static function eliminarVehiculo($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta['listado']=Vehiculo::EliminarVehiculo($id);    
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Marca
    public static function getMarcas(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Marca::TraerTodosLasMarcas(); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaMarca($descripcion){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= Marca::AltaMarca($descripcion);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    

    public static function eliminarMarca($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta = Marca::EliminarMarca($id);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Modelos
    public static function getModelos(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Modelo::TraerTodosLosModelos();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaModelo($descripcion){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=Modelo::AltaModelo($descripcion);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function eliminarModelo($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=Modelo::EliminarModelo($id);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    
    //Estados de Viaje
    public static function getEstadosViaje(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=EstadoViaje::TraerTodosLosEstados(); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Medios de pago
    public static function getMediosPago(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=MedioPago::TraerTodosLosMedios();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaMedioPago($descripcion){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=MedioPago::AltaMedioPago($descripcion);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function eliminarMedioPago($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                  
                $respuesta=MedioPago::EliminarMedioPago($id);  
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }


    //Localidades
    public static function getLocalidades(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Localidad::TraerTodosLasLocalidades();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaLocalidad($descripcion){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=Localidad::AltaLocalidad($descripcion); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    
    public static function eliminarLocalidad($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=Localidad::EliminarLocalidad($id); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Pagos
    public static function getPagos(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Pago::TraerTodaLosPagos();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function getPagosPorFactura($idFactura){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Pago::TraerPagosPorFactura($idFactura); 
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function insertarPago($idFactura,$monto){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=Pago::InsertarPago($idFactura,$monto);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Cliente
    public static function getClientes(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Cliente::TraerTodosLosClientes();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaCliente($nombre,$mail,$pass){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=Cliente::AltaCliente($nombre,$mail,$pass);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function deleteCliente($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=Cliente::EliminarCliente($id);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function updatePassCliente($id,$pass){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=Cliente::ActualizaClaveCliente($id,$pass);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Factura
    public static function getFacturas(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Factura::TraerTodasLasFacturas();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function getFacturasPorClientes($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Factura::TraerTodasLasFacturasPorClientes($id);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function getFacturasPorClientesNoPagas($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Factura::TraerTodasFacturasPorClientesNoPagas($id);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function actualizarFacturaPaga($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta['listado']=Factura::ActualizarFacturaPaga($id);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function altaFactura($monto,$idViaje,$idCliente,$pagada){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta['listado']=Factura::AltaFactura($monto,$idViaje,$idCliente,$pagada);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    //Cuenta Corriente
    public static function getCuentasCorrientes(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=CuentaCorriente::TraerTodosLasCuentaCorrientes();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function insertCuentaCorriente($idCliente){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=CuentaCorriente::AltaCuentaCorriente($idCliente);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    
    public static function deleteCuentaCorriente($id){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=CuentaCorriente::EliminarCuentaCorriente($id);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function actualizarSaldoCuentaCorriente($idCliente,$saldo){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){                
                $respuesta=CuentaCorriente::ActualizarSaldoCuentaCorriente($idCliente,$saldo);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }    

    //Viajes
    public static function getViajes(){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Viaje::TraerTodosViajes();
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function getViajesSegunEstado($idEstado){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Viaje::TraerViajesSegunEstado($idEstado);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    

    public static function getViajesSegunConductor($idConductor){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Viaje::TraerViajesSegunConductor($idConductor);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    
    public static function getViajesSegunCliente($idCliente){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta= array();           
                $respuesta['listado']=Viaje::TraerViajesSegunCliente($idCliente);
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function insertarViaje($idCliente,$idDestino,$idOrigen,$idMedioPago,
                                            $idVehiculo){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=Viaje::InsertViaje($idCliente,$idDestino,$idOrigen,$idMedioPago,
                                        $idVehiculo);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }    

    
    
    public static function cancelarViaje($idViaje){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=Viaje::CancelarViaje($idViaje);   
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function asignarViajeConductor($idViaje,$idConductor){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                $respuesta=Viaje::AsignarViajeConductor($idViaje, $idConductor);  
                echo self::getArrayResponse($respuesta, true);
            }else{
                echo self::getArraySinSession();                
            }
    }


    


    public static function finalizarViaje($idViaje,$idCliente,$monto,$pagada){ 
            session_start(); 
            if (isset($_SESSION['haySession'])){
                

                ///1- actualizar estado de viaje Viaje
                $respuesta = Viaje::FinalizarViaje($idViaje);   
                $arrayJsonActViaje = json_encode($respuesta);
                if($arrayJsonActViaje==1){
                            //2- crear factura
                    $respuestaFact = (int) Factura::AltaFactura($monto,$idViaje,$idCliente,$pagada);   
                    $idFactura = json_encode($respuestaFact);
    
                    //3- asignar en pago o cuenta corriente:
                    if($pagada==1){    
                        Pago::InsertarPago($idFactura,$monto);      
                    }else{
                        CuentaCorriente::ActualizarSaldoCuentaCorriente($idCliente,$monto);
                    }
                    echo self::getArrayResponse("OK.", true);
        
                }else{
                    echo self::getArrayResponse("Error.", false);
                }


                
            }else{
                echo self::getArraySinSession();                
            }
    }

    public static function testIdFactura($idViaje,$idCliente,$monto,$pagada){ 
        
                    $respuestaFact = (int) Factura::AltaFactura($monto,$idViaje,$idCliente,$pagada);   
                    $idFactura =  json_encode($respuestaFact);
                    echo $idFactura;
    }


}    

?>   