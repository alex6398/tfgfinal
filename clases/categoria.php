<?php
class categoria{
    
    protected $pdo;
    protected $datos;
    
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    
}

?>