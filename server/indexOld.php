<?php




/** Finalizar Viaje implica varios pasos*/
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

