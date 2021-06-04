<?php

include 'config/config.php';
include 'clases/usuario.php';
include 'clases/categoria.php';
include 'clases/subcategoria.php';
include 'clases/Articulos.php';
include 'clases/marcas.php';
include 'clases/pedidos.php';
include 'clases/detallepedidos.php';

global $pdo;

session_start();
//creamos los objetos a utilicar
$usuario = new usuario($pdo);

$categoria = new categoria($pdo);

$subcategoria = new subcategoria($pdo);

$articulos= new Articulos($pdo);

$marcas= new marcas($pdo);

$pedidos= new pedidos($pdo);

$detalle_pedidos= new detallepedidos($pdo);

define("BASE_URL", "http://localhost/misProyectos/tfgfinal/");


?>