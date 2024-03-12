<?php

include_once('db/db.php');

class UsuariosDAO {

    private $db_con;

    public function __construct(){
        $this->db_con = Database::connect();
    }

    public function getAllUsuarios(){
        $stmt = $this->db_con->prepare("SELECT * FROM usuarios");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();
        $usuarios = array();

        return $stmt->fetchAll();
    }

    public function getUsuarioById($id){
        $stmt = $this->db_con->prepare("SELECT * FROM usuarios WHERE id_usuario = $id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUserByUsernameAndPassword($username, $password) {
        $stmt = $this->db_con->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :username AND password_usuario = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function insertUsuario($nombre_usuario, $password_usuario, $correo_electronico){
    
        $stmt = $this->db_con->prepare("INSERT INTO usuarios (nombre_usuario, password_usuario, correo_electronico) VALUES (:nombre_usuario, :password_usuario, :correo_electronico)");
    
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':password_usuario', $password_usuario);
        $stmt->bindParam(':correo_electronico', $correo_electronico);
    
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}