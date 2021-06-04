<?php
class detallepedidos{
    
    protected $pdo;
    protected $datos;
    
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function meter_detallepedido($pedido_id,$articulo_id,$cantidad){
        $stmt = $this->pdo->prepare("INSERT INTO `detalle_pedidos` ( `pedido_id`, `articulo_id`, `cantidad`) VALUES (:pedido_id, :articulo_id,:cantidad)");

        $stmt->bindParam(":pedido_id",$pedido_id, PDO::PARAM_INT);
        $stmt->bindParam(":articulo_id",$articulo_id, PDO::PARAM_INT);
        $stmt->bindParam(":cantidad",$cantidad, PDO::PARAM_INT);

        $stmt->execute();
    }
    public function getdetallepedidos($pedido_id){
        $stmt = $this->pdo->prepare("SELECT * FROM detalle_pedidos WHERE pedido_id = ".$pedido_id."");
        $stmt->bindParam(":pedido_id",$pedido_id, PDO::PARAM_INT);
        $stmt->execute();    
        while($row=$stmt->fetch()){
            $this->datos[]=$row;
        }
        return $this->datos;
    }
}
?>