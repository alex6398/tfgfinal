<?php
class marcas{
    
    protected $pdo;
    protected $datos;
    
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    function verNombre($cod){
        $stmt = $this->pdo->prepare("SELECT nombre FROM `marcas` WHERE codMarca = :cod");
        $stmt->bindParam(":cod",$cod, PDO::PARAM_STR);
        $stmt->execute();    
        while($row=$stmt->fetch()){
            $this->datos[]=$row;
        }
        return $this->datos;
    }
}
?>