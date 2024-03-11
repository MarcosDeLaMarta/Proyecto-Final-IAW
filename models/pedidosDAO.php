<?php

include_once ('db/db.php');

class PedidosDAO {

    private $db_con;

    public function __construct(){
        $this->db_con = Database::connect();
    }

    public function getAllPedidos(){
        $stmt = $this->db_con->prepare("SELECT * FROM pedidos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $pedidos = array();

        return $stmt->fetchAll();
    }

    public function getPedidoById($id){
        $stmt = $this->db_con->prepare("SELECT * FROM pedidos WHERE id_pedido = $id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function insertPedido($id_usuario, $fecha_pedido, $estado){
        $stmt = $this->db_con->prepare("INSERT INTO pedidos (id_usuario, fecha_pedido, estado) VALUES (:id_usuario, :fecha_pedido, :estado)");
    
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_pedido', $fecha_pedido);
        $stmt->bindParam(':estado', $estado);
    
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}