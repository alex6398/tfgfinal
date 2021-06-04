<?php  
include_once '../init.php';
//se comprueba que existe el get de action 
if(isset($_GET['action'])){
    //se comprueba que el action es igual a remove
    if($_GET['action'] == "remove"){
        //se busca dentro del array y se comprueba de que el value['id'] es igual al get['id'] y borrar ese artículo del carrito (unset)
        foreach($_SESSION['carrito'] as $key => $value){
            if($value['id'] == $_GET['id']){
                unset($_SESSION['carrito'][$key]);
                header ('Location: ../index.php'); //después se redirecciona a la pagina principal
            }
        }
    }
}


?>