<?php

include_once ('db/db.php');

class DetallesPedidoDAO {

    private $db_con;

    public function __construct(){
        $this->db_con = Database::connect();
    }

    public function getAllDetallesPedido(){
        $stmt = $this->db_con->prepare("SELECT * FROM detalles_pedido");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $detallesPedido = array();

        return $stmt->fetchAll();
    }

    public function getDetallesPedidoById($id){
        $stmt = $this->db_con->prepare("SELECT * FROM detalles_pedido WHERE id_detalle = $id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function insertDetallesPedido($id_pedido, $id_comic, $cantidad){
        $stmt = $this->db_con->prepare("INSERT INTO detalles_pedido (id_pedido, id_comic, cantidad) VALUES (:id_pedido, :id_comic, :cantidad)");
    
        $stmt->bindParam(':id_pedido', $id_pedido);
        $stmt->bindParam(':id_comic', $id_comic);
        $stmt->bindParam(':cantidad', $cantidad);
    
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}