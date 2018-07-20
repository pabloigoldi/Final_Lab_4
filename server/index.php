<?php

/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */

require 'vendor/autoload.php';

include 'PHP/Nexo.php';






/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */

//$app = new Slim\App();
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]); // cuando falla



/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */
/**
* GET: Para consultar y leer recursos
* POST: Para crear recursos
* PUT: Para editar recursos
* DELETE: Para eliminar recursos
*
*  GET: Para consultar y leer recursos */

$app->get('/', function ($request, $response, $args) {
    $response->write("Welcome to Slim!");
    return $response;
});




/* Login*/
$app->get('/login/{nombre}/{mail}/{clave}/{tipoUser}', function ($request, $response, $args) {
    $nombre = $args['nombre'];
    $mail = $args['mail'];
    $clave = $args['clave'];
    $tipoUser = $args['tipoUser'];
    echo Nexo::Login($nombre, $mail, $clave,$tipoUser);
});

$app->get('/deslogin[/]', function ($request, $response, $args) {
	echo Nexo::Deslogin();
});
/* Fin de Login*/





/** Encuesta*/
$app->get('/encuestas[/]', function ($request, $response, $args) {
    echo Nexo::getEncuestas() ;      
});

$app->post('/encuesta/{idViaje}/{calificacion}/{comentario}', 
            function ($request, $response, $args) {    
    echo Nexo::InsertarEncuesta($args['idViaje'],$args['calificacion'],$args['comentario']);        
 });

$app->delete('/encuesta/{id}', function ($request, $response, $args) {
    echo Nexo::EliminarEncuesta($args['id']);    
});
/** Fin de Encuesta*/


/** Conductor*/
$app->get('/conductores[/]', function ($request, $response, $args) {
	echo Nexo::getConductor() ; 
});

$app->post('/conductor/{nombre}/{correo}/{pass}/{idVehiculo}', 
                    function ($request, $response, $args) {
    echo Nexo::AltaConductor($args['nombre'],$args['correo']
                                            ,$args['pass'],$args['idVehiculo']);   
 });

$app->delete('/conductor/{id}', function ($request, $response, $args) {
    echo Nexo::EliminarConductor($args['id']);    
});

$app->put('/conductorClave/{id}/{pass}', function ($request, $response, $args) {
    echo Nexo::ActualizaClaveConductor($args['id'],$args['pass']);   
});

$app->put('/conductorVehiculo/{id}/{idVehiculo}', function ($request, $response, $args) {
    echo Nexo::ActualizaVehiculoConductor($args['id'],$args['idVehiculo']);   
});
/** Fin de Conductor*/

/** Vehiculo*/
$app->get('/vehiculos[/]', function ($request, $response, $args) {
    echo Nexo::getVehiculos();      
});


 $app->post('/vehiculo/{idMarca}/{idModelo}/{anio}'
                            , function ($request, $response, $args) {
    echo Nexo::altaVehiculo($args['idMarca'],$args['idModelo'],$args['anio']);   
 });

$app->delete('/vehiculo/{id}', function ($request, $response, $args) {
    echo Nexo::eliminarVehiculo($args['id']);    
});

/** Fin de Vehiculo*/

/** Marca*/
$app->get('/marcas[/]', function ($request, $response, $args) {
    echo Nexo::getMarcas();      
});

 $app->post('/marca/{descripcion}', function ($request, $response, $args) {
    echo Nexo::altaMarca($args['descripcion']);   
 });

$app->delete('/marca/{id}', function ($request, $response, $args) {
    echo Nexo::eliminarMarca($args['id']);    
});

/** Fin de Marca*/


/** Modelo*/
$app->get('/modelos[/]', function ($request, $response, $args) {
    echo Nexo::getModelos();      
});

$app->post('/modelo/{descripcion}', function ($request, $response, $args) {
    echo Nexo::altaModelo($args['descripcion']);   
 });

$app->delete('/modelo/{id}', function ($request, $response, $args) {
    echo Nexo::eliminarModelo($args['id']);    
});
/** Fin de Modelo*/

/** Estado viaje*/
$app->get('/estadosViaje[/]', function ($request, $response, $args) {
    echo Nexo::getEstadosViaje();      
});
/** Fin de Estado viaje*/

/** Medio de Pago*/
$app->get('/mediosPago[/]', function ($request, $response, $args) {
    echo Nexo::getMediosPago();      
});

$app->post('/medioPago/{descripcion}', function ($request, $response, $args) {
    echo Nexo::altaMedioPago($args['descripcion']);   
});

$app->delete('/medioPago/{id}', function ($request, $response, $args) {
    echo Nexo::eliminarMedioPago($args['id']);    
});
/** Fin de Medio de Pago*/


/** Localidad*/
$app->get('/localidades[/]', function ($request, $response, $args) {
    echo Nexo::getLocalidades();      
});


$app->post('/localidad/{descripcion}', function ($request, $response, $args) {
    echo Nexo::altaLocalidad($args['descripcion']);   
 });

$app->delete('/localidad/{id}', function ($request, $response, $args) {
    echo Nexo::eliminarLocalidad($args['id']);    
});

/** Fin de Localidad*/


/** Pago*/
$app->get('/pagos[/]', function ($request, $response, $args) {
    echo Nexo::getPagos();      
});


$app->get('/pagosPorFactura/{idFactura}', function ($request, $response, $args) {
    echo Nexo::getPagosPorFactura($args['idFactura']);      
});

$app->post('/pago/{idFactura}/{monto}', function ($request, $response, $args) {
    echo Nexo::insertarPago($args['idFactura'],$args['monto']);
 });
/** Fin de Pago*/








/** Encargado*/
 $app->post('/encargado/{nombre}/{comentario}', function ($request, $response, $args) {
    ///TO DO
 });
/** Fin del Encargado*/


/** Cliente*/
$app->get('/clientes[/]', function ($request, $response, $args) {
    echo Nexo::getClientes();      
});

$app->post('/cliente/{nombre}/{mail}/{pass}'
                , function ($request, $response, $args) {
    echo Nexo::altaCliente($args['nombre'],$args['mail'],$args['pass']);   
 });

$app->delete('/cliente/{id}', function ($request, $response, $args) {
    echo Nexo::deleteCliente($args['id']);    
});

$app->put('/clienteClave/{id}/{pass}', function ($request, $response, $args) {
      echo Nexo::updatePassCliente($args['id'],$args['pass']);   
});
/** Fin de Estado Cliente*/




/** Cuenta Factura*/
$app->get('/facturas[/]', function ($request, $response, $args) {
    echo Nexo::getFacturas();      
});


$app->get('/facturasPorClientes/{id}', function ($request, $response, $args) {
    echo Nexo::getFacturasPorClientes($args['id']);      
});

$app->get('/facturasPorClientesNoPagas/{id}', function ($request, $response, $args) {
    echo Nexo::getFacturasPorClientesNoPagas($args['id']);      
});

$app->put('/actualizarFacturaPaga/{id}', function ($request, $response, $args) {
      echo Nexo::actualizarFacturaPaga($args['id']);   
});

$app->post('/factura/{monto}/{idViaje}/{idCliente}/{pagada}', 
                        function ($request, $response, $args) {
    echo Nexo::altaFactura($args['monto'],$args['idViaje'],
                                $args['idCliente'],$args['pagada']);   
 });
/** Fin de Factura*/


$app->get('/cuentascorrientes[/]', function ($request, $response, $args) {
    echo Nexo::getCuentasCorrientes();      
});

 $app->post('/cuentacorriente/{idCliente}', function ($request, $response, $args) {
    echo Nexo::insertCuentaCorriente($args['idCliente']);   
 });


$app->delete('/cuentacorriente/{id}', function ($request, $response, $args) {
    echo Nexo::deleteCuentaCorriente($args['id']);    
});


$app->put('/cuentacorrienteSaldo/{idCliente}/{saldo}', function ($request, $response, $args) {
      echo Nexo::actualizarSaldoCuentaCorriente($args['idCliente'],$args['saldo']);   
});
/** Fin de Cuenta Corriente*/


/** Viaje*/
$app->get('/viajes[/]', function ($request, $response, $args) {
	echo Nexo::getViajes();      
});

$app->get('/viajesSegunEstado/{idEstado}', function ($request, $response, $args) {
    echo Nexo::getViajesSegunEstado($args['idEstado']);      
});

$app->get('/viajesSegunConductor/{idConductor}', function ($request, $response, $args) {
    echo Nexo::getViajesSegunConductor($args['idConductor']);      
});

$app->get('/viajesSegunCliente/{idCliente}', function ($request, $response, $args) {
    echo Nexo::getViajesSegunCliente($args['idCliente']);      
});


$app->post('/viaje/{idCliente}/{idDestino}/{idOrigen}/{idMedioPago}/{idVehiculo}',
                                     function ($request, $response, $args) {
	echo Nexo::insertarViaje($args['idCliente'],$args['idDestino'],$args['idOrigen'],
                                    $args['idMedioPago'],$args['idVehiculo']);   
 });


$app->put('/cancelarViaje/{id}', function ($request, $response, $args) {
      echo Nexo::cancelarViaje($args['id']);   
});

$app->put('/asignarViajeConductor/{idViaje}/{idConductor}', function ($request, $response, $args) {
      echo Nexo::asignarViajeConductor($args['idViaje'], $args['idConductor']);   
});

/** Fin de Viaje*/



$app->put('/finalizarViaje/{idViaje}/{idCliente}/{monto}/{pagada}', 
            function ($request, $response, $args) {

    $pagada = $args['pagada'];
    $idViaje = $args['idViaje'];
    $idCliente = $args['idCliente'];
    $monto = $args['monto'];
	echo Nexo::finalizarViaje($idViaje, $idCliente,$monto, $pagada);   

});


$app->get('/testIdFactura/{idViaje}/{idCliente}/{monto}/{pagada}',
					 function ($request, $response, $args) {
    $pagada = $args['pagada'];
    $idViaje = $args['idViaje'];
    $idCliente = $args['idCliente'];
    $monto = $args['monto'];
	echo Nexo::testIdFactura($idViaje, $idCliente,$monto, $pagada);   
     
});





/** Finalizar Viaje implica varios pasos
$app->put('/finalizarViaje/{idViaje}/{idCliente}/{monto}/{pagada}', 
            function ($request, $response, $args) {

    $pagada = $args['pagada'];
    $idViaje = $args['idViaje'];
    $idCliente = $args['idCliente'];
    $monto = $args['monto'];

    //1- actualizar estado de viaje Viaje
    $respuesta = Viaje::FinalizarViaje($idViaje);   
    $arrayJsonActViaje = json_encode($respuesta);
    if($arrayJsonActViaje==1){
        //2- crear factura
        $respuestaFact = Factura::AltaFactura($monto,$idViaje,$idCliente,$monto);   
        $idFactura = json_encode($respuestaFact);
    
        //3- asignar en pago o cuenta corriente:
        if($pagada==1){    
            Pago::InsertarPago($idFactura,$monto);      
        }else{
            CuentaCorriente::ActualizarSaldoCuentaCorriente($idCliente,$monto);
        }
        
    }else{
        echo "error";
    }
});
/*Viaje implica varios pasos*/


/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
