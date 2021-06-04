<?php
class pedidos{
    
    protected $pdo;
    protected $datos;

    
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function meter_pedido($id_usuario,$total,$fecha){
        $stmt = $this->pdo->prepare("INSERT INTO `pedidos`( `id_usuario`, `total`, `fecha`) VALUES (:id_usuario, :total, :fecha)");

        $stmt->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":total",$total, PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$fecha, PDO::PARAM_STR);

        $stmt->execute();
    }
    public function getpedidos($id_usuario){
        $stmt = $this->pdo->prepare("SELECT * FROM `pedidos` WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);

        $stmt->execute();    
        while($row=$stmt->fetch()){
            $this->datos[]=$row;
        }
        return $this->datos;
    }
    public function getlastID(){
        $stmt = $this->pdo->prepare("SELECT MAX(id) as id FROM `pedidos`");

        $stmt->execute();    
        while($row=$stmt->fetch()){
            $this->datos[]=$row;
        }
        return $this->datos;
    }
}

?>