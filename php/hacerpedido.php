<?php
include_once '../init.php';
    /*Se comprueba si existe  la llamada por get action*/
    if(isset($_GET['action'])){
        /*Se comprueba si action es igual a limpiarcarro*/
        if($_GET['action'] == "limpiarcarro"){
            $total=0;
            $resta=0;
            //se calcula el total de todos los articulos del carrito (precio*cantidad)
            foreach($_SESSION['carrito'] as $key => $value){
                $total=$total+ $value['cantidad']*$value['precio'];
            }  
            //fecha al momento de introducir el nuevo pedido
            $fecha=date("Y-m-d H:i:s"); 
            //nuevo pedido
            $nuevo_pedido=$pedidos->meter_pedido($_SESSION['id'],$total,$fecha);
            //consegir el id del ultimo pedido introducido
            $last_ID=$pedidos->getlastID();
            
            //se recorre el carrito para introducir los datos de detallepedidos
           foreach($last_ID as $ID_valor){
               
            foreach($_SESSION['carrito'] as $key => $value){
                /*se inserta los datos de los articulos de cada pedido*/
               $ver_detalle_pedido=$detalle_pedidos->meter_detallepedido($ID_valor['id'],$value['id'],$value['cantidad']);
                /*se obtiende los datos de los articulos de cada pedido*/
                $ver_datos_articulo=$articulos->getdatos($value['id']);
                foreach($ver_datos_articulo as $dato_articulo){
                    /*se resta la cantidad de stock con la cantidad que se ha comprado*/
                    $resta=$dato_articulo['cantidad']-$value['cantidad'];
                    /*se actualiza la cantidad en stock por el resultado de la resta anterior y se guarda en la base de datos */
                    $actualizar=$articulos->actualizar_articulo($resta,$value['id']);
                    /*se resetea la resta sino restaria con el resultado anterior mas el nuevo*/
                    $resta=0;
                }
                
                
            }   
           }
            /*se borra la lista del carrito */
            unset($_SESSION['carrito']);
            /*se redirige */
            header ('Location: ./gracias.php');
        }
    }
?>